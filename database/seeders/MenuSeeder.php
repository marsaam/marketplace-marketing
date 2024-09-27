<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'menu_name' => 'Burger',
                'user_id' => '1',
                'menu_description' => 'Delicious beef burger with fresh vegetables.',
                'menu_photo' => 'burger.jpg',
                'menu_type' => 'heavy', // Type: heavy
                'menu_price' => '50000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Pizza',
                'user_id' => '1',
                'menu_description' => 'Cheesy pizza with pepperoni topping.',
                'menu_photo' => 'pizza.jpg',
                'menu_type' => 'heavy', // Type: heavy
                'menu_price' => '75000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Pasta',
                'user_id' => '2',
                'menu_description' => 'Creamy alfredo pasta with mushrooms.',
                'menu_photo' => 'pasta.jpg',
                'menu_type' => 'heavy', // Type: heavy
                'menu_price' => '60000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Salad',
                'user_id' => '2',
                'menu_description' => 'Fresh garden salad with a variety of greens.',
                'menu_photo' => 'salad.jpg',
                'menu_type' => 'healthy', // Type: healthy
                'menu_price' => '40000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Steak',
                'user_id' => '2',
                'menu_description' => 'Grilled steak with mashed potatoes.',
                'menu_photo' => 'steak.jpg',
                'menu_type' => 'heavy', // Type: heavy
                'menu_price' => '120000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Sushi',
                'user_id' => '1',
                'menu_description' => 'Fresh salmon sushi with wasabi and soy sauce.',
                'menu_photo' => 'sushi.jpg',
                'menu_type' => 'healthy', // Type: healthy
                'menu_price' => '90000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Tacos',
                'user_id' => '2',
                'menu_description' => 'Spicy beef tacos with salsa and guacamole.',
                'menu_photo' => 'tacos.jpg',
                'menu_type' => 'snack', // Type: snack
                'menu_price' => '45000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Ramen',
                'user_id' => '1',
                'menu_description' => 'Japanese ramen with pork broth and egg.',
                'menu_photo' => 'ramen.jpg',
                'menu_type' => 'heavy', // Type: heavy
                'menu_price' => '70000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Ice Cream',
                'user_id' => '1',
                'menu_description' => 'Vanilla ice cream with chocolate syrup.',
                'menu_photo' => 'ice_cream.jpg',
                'menu_type' => 'dessert', // Type: dessert
                'menu_price' => '30000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_name' => 'Fried Chicken',
                'user_id' => '2',
                'menu_description' => 'Crispy fried chicken with special seasoning.',
                'menu_photo' => 'fried_chicken.jpg',
                'menu_type' => 'heavy', // Type: heavy
                'menu_price' => '55000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
