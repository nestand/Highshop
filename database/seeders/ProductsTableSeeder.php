<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<9;$i++)
        DB::table('products')->insert([
            'title' => 'Product ' .$i,
            'price' => rand(35, 150),
            'in_stock' => 1,
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta nisi pariatur alias minima eligendi ratione commodi numquam cupiditate architecto minus! Rerum perspiciatis possimus sint pariatur!'
            ]);
        
    }
}

// php artisan make:seeder ProductsTableSeeder 
// php artisan db:seed --class=ProductsTableSeeder
