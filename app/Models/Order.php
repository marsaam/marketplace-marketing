<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'order_menu')->withPivot('total_ordering')->withTimestamps();
    }
}
