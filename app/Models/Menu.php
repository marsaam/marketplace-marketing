<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_menu')->withPivot('total_ordering')->withTimestamps();
    }

    // public function orders()
    // {
    //     return $this->belongsToMany(Order::class, 'menu_order')
    //                 ->withPivot('user_id') // Menyimpan user_id di pivot
    //                 ->withTimestamps(); // Mengambil timestamp
    // }
}
