<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\MenuOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function invoice()
    {
        // Ambil user dengan role merchant
        $merchants = User::where('role', 'merchant')->get();

        // Ambil user dengan role customer
        $customers = User::where('role', 'customer')->get();

        // Ambil order terbaru
        $latestOrder = Order::latest()->first(); // Ambil order_id terbaru

        // Ambil semua menu orders yang berhubungan dengan order_id terbaru
        $menu_orders = MenuOrder::where('order_id', $latestOrder->id)->get();

        // Ambil semua menu yang terkait dengan menu_orders
        $menu_ids = $menu_orders->pluck('menu_id')->toArray(); // Ambil menu_id dari menu_orders
        $menus = Menu::whereIn('id', $menu_ids)->get(); // Ambil menu berdasarkan id

        // Jika ingin juga mengirimkan seluruh order (opsional)
        $orders = Order::all();

        return view('invoice', compact('merchants', 'customers', 'menus', 'orders', 'menu_orders'));
    }


    public function order(Request $request)
    {
        // Validasi input
        $request->validate([
            'menu_id' => 'required|array',
            'total_ordering' => 'required|array',
            'date_ordering' => 'required|date',
        ]);

        // Buat order baru
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'date_ordering' => $request->date_ordering,
        ]);

        // Loop melalui menu_id dan total_ordering
        foreach ($request->menu_id as $key => $menu_id) {
            MenuOrder::create([
                'order_id' => $order->id,  // Ambil ID order yang baru dibuat
                'menu_id' => $menu_id,     // ID menu dari request
                'total_ordering' => $request->total_ordering[$key], // Total pesanan dari input form
            ]);
        }

        // Redirect ke halaman invoice dengan order_id
        return redirect()->route('invoice', ['order_id' => $order->id]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'menu_name' => 'string|max:255',
            'menu_price' => 'numeric',
            'menu_type' => 'string|max:500',
            'menu_description' => 'string|max:500',
            // 'menu_photo' => 'image|mimes:jpg,jpeg,png|max:2048', // Maksimum file 2MB
        ]);
        // Simpan data ke database
        $menu = Menu::create([
            'user_id' => Auth::id(), // Ambil ID user yang login
            'menu_name' => $request->menu_name,
            'menu_price' => $request->menu_price,
            'menu_type' => $request->menu_type,
            'menu_description' => $request->menu_description,
            // 'menu_photo' => $filename, // Nama file foto yang disimpan
        ]);

        // Redirect atau response
        return redirect()->route('invoice')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function delete($id)
    {
        // Temukan menu berdasarkan id
        $menu = Menu::findOrFail($id);

        // Hapus file foto dari folder (jika ada)
        if ($menu->menu_photo && file_exists(public_path('uploads/menus/' . $menu->menu_photo))) {
            unlink(public_path('uploads/menus/' . $menu->menu_photo)); // Hapus file foto
        }

        // Hapus data dari database
        $menu->delete();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Menu berhasil dihapus!');
    }

    public function edit($id)
    {
        $edit = menu::findOrFail($id);
        $menus = menu::all();

        return view('menu', compact('menus', 'edit')); // Kirim data ke view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'menu_name' => 'string|max:255',
            'menu_price' => 'numeric',
            'menu_type' => 'string|max:500',
            'menu_description' => 'string|max:500',
            // 'menu_photo' => 'image|mimes:jpg,jpeg,png|max:2048', // Maksimum file 2MB
        ]);
        $menu = Menu::findOrFail($id);

        // Update data menu
        $menu->menu_name = $request->menu_name;
        $menu->menu_price = $request->menu_price;
        $menu->menu_type = $request->menu_type;
        $menu->menu_description = $request->menu_description;
        $menu->save();

        // Redirect atau response
        return redirect()->back()->with('success', 'Menu berhasil diperbarui!');
    }

    public function menu()
    {
        $menus = Menu::all();
        return view('menu', compact('menus'));
    }

    public function profile()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        $companyProfile = $user; // Assign ke variabel companyProfile

        return view('profile', compact('companyProfile'));
    }

    public function invoiceIndex()
    {
        $menu_orders = MenuOrder::all();
        return view('invoice-index', compact('menu_orders'));
    }
}
