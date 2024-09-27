<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function StoreSignUp(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|string|email|max:255',
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'company_contact' => 'required|string|max:255',
            'company_desc' => 'nullable|string|max:255',
            'role' => 'required|in:merchant,customer', // Validate role against enum values
            'password' => 'required|string|min:8',
        ]);

        // Menyimpan data user ke dalam database
        $user = User::create([
            'email' => $request->email,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_contact' => $request->company_contact,
            'company_desc' => $request->company_desc,
            'role' => $request->role,
            'password' => Hash::make($request->password), // Hashing password
        ]);

        $user->assignRole($user->role);

        // Return response atau redirect sesuai kebutuhan
        return redirect()->route('sign-in')->with('success', 'User berhasil ditambahkan');

    }

    public function storeSignIn(Request $request)
    {
        // Validasi data request
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Coba untuk login user
        if (Auth::attempt($credentials)) {
            // Jika login berhasil, redirect dengan pesan sukses
            return redirect()->route('menu')->with('success', 'You have successfully logged in!');
        }

        // Jika login gagal, redirect kembali dengan pesan error
        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function SignUp()
    {
        return view('auth.sign-up');
    }

    public function SignIn()
    {
        return view('auth.sign-in');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/sign-in'); // Redirect to the home page or login page
    }
}
