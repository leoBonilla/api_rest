<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Pizza Margherita',
                'price' => 8.99,
                'photo' => 'images/pizza_margherita.jpg',
                'stock' => 100,
                'status' => true,
            ],
            [
                'name' => 'Hamburguesa Clásica',
                'price' => 5.99,
                'photo' => 'images/hamburguesa_clasica.jpg',
                'stock' => 50,
                'status' => true,
            ],
            [
                'name' => 'Ensalada César',
                'price' => 6.50,
                'photo' => 'images/ensalada_cesar.jpg',
                'stock' => 30,
                'status' => true,
            ],
            [
                'name' => 'Sushi Roll',
                'price' => 12.00,
                'photo' => 'images/sushi_roll.jpg',
                'stock' => 25,
                'status' => true,
            ],
            [
                'name' => 'Tacos al Pastor',
                'price' => 3.50,
                'photo' => 'images/tacos_al_pastor.jpg',
                'stock' => 80,
                'status' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
