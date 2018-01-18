<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('products')->truncate();
    	$this->createProducts();
    }


    private function createProducts()
    {
    	Product::create([
    		'title' => 'HD Notebook 500gb',
    		'description' => '<p>HD para notebooks qualquer modelo, 500GB capacidade.</p>',
    		'image' => 'hdnotebook.jpg',
    		'stock' => '5'
    		]);

    	Product::create([
    		'title' => 'SSD 250gb',
    		'description' => '<p>HD SSD 250gb de capacidade, alto desempenho.</p>',
    		'image' => 'hdssd.jpg',
    		'stock' => '1'
    		]);

    	Product::create([
    		'title' => 'Memória RAM DDR3 4GB',
    		'description' => '<p>Memória RAM DDR3 1600.</p>',
    		'image' => 'ramdesktop.jpg',
    		'stock' => '20'
    		]);

    	Product::create([
    		'title' => 'Memória RAM Notebook 4GB',
    		'description' => '<p>Memória RAM DDR3 1300, para notebooks.</p>',
    		'image' => 'ramnotebook.jpg',
    		'stock' => '10'
    		]);

    	$this->command->info('Demo Product createds!');
    }
}
