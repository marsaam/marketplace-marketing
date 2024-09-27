<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $guarded = [];
    public function menus()
    {
        return $this->hasMany(Menu::class, 'user_id'); // pastikan user_id di Menu merujuk ke User
    }
    // public function menus()
    // {
    //     return $this->hasMany(Menu::class);
    // }

    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }
}
