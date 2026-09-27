<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@furnish.test'],
            [
                'name' => 'Admin Furnish',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        $categories = [];

        foreach (['Chairs', 'Tables', 'Lamps', 'Decor'] as $name) {
            $categories[$name] = Category::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | PRODUK KOLEKSI FAVORIT
        |--------------------------------------------------------------------------
        | BAGIAN INI TETAP SEPERTI PUNYA KAMU
        */

        $items = [
            ['Modern Chair', 'Chairs', 29, 'product-img-1.jpg', 20],
            ['Floor Lamp', 'Lamps', 89, 'product-img-2.jpg', 15],
            ['Comfort Chair', 'Chairs', 28, 'product-img-3.jpg', 18],
            ['High Back Boss Chair', 'Chairs', 68, 'product-img-5.jpg', 12],
            ['Fancy Metal Clock', 'Decor', 38, 'product-img-6.jpg', 10],
            ['Modern Table', 'Tables', 75, 'product-img-4.jpg', 8],
            ['Wooden Decor', 'Decor', 45, 'product-img-7.jpg', 14],
            ['Classic Sofa', 'Tables', 120, 'product-img-8.jpg', 6],
        ];

        foreach ($items as [$name, $cat, $price, $image, $stock]) {
            Product::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'category_id' => $categories[$cat]->id,
                    'name' => $name,
                    'description' => 'Produk furniture berkualitas dengan desain modern dan nyaman untuk melengkapi ruangan Anda.',
                    'price' => $price,
                    'stock' => $stock,
                    'image' => $image,
                    'is_active' => true,
                    'is_slider' => false,
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | PRODUK KHUSUS SLIDER HOME
        |--------------------------------------------------------------------------
        | 3 produk ini terpisah dari Koleksi Favorit.
        */

        $sliderProducts = [
      [
         'name' => 'Comfy Sofa Home-Office',
         'slug' => 'comfy-sofa-home-office',
         'description' => 'Comfortable and stylish sofa for your home office.',
         'price' => 99,
         'stock' => 10,
         'image' => 'slider/slider-img-1.png',
      ],
      [
         'name' => 'Exchange your old furniture',
         'slug' => 'exchange-your-old-furniture',
         'description' => 'Save up to $50 for your home office.',
         'price' => 89,
         'stock' => 10,
         'image' => 'slider/slider-img-2.png',
      ],
      [
         'name' => 'Crafted royal comfort sofa',
         'slug' => 'crafted-royal-comfort-sofa',
         'description' => 'Experience the elegance of timeless furniture.',
         'price' => 120,
         'stock' => 10,
         'image' => 'slider/slider-img-3.png',
      ],
   ];

        foreach ($sliderProducts as $slider) {
            Product::updateOrCreate(
                ['slug' => $slider['slug']],
                [
                    'category_id' => $categories['Chairs']->id,
                    'name' => $slider['name'],
                    'description' => $slider['description'],
                    'price' => $slider['price'],
                    'stock' => $slider['stock'],
                    'image' => $slider['image'],
                    'is_active' => true,
                    'is_slider' => true,
                ]
            );
        }
    }
}