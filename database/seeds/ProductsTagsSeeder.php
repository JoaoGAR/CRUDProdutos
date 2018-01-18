<?php

use Illuminate\Database\Seeder;
use App\Products_tags;

class ProductsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('products_tags')->truncate();
    	$this->createProducts_tags();
    }


    private function createProducts_tags()
    {
    	Products_tags::create([
    		'id_tag' => 1,
    		'id_product' => 1
    		]);

    	Products_tags::create([
    		'id_tag' => 4,
    		'id_product' => 1
    		]);

    	Products_tags::create([
    		'id_tag' => 1,
    		'id_product' => 2
    		]);

    	Products_tags::create([
    		'id_tag' => 3,
    		'id_product' => 2
    		]);

    	Products_tags::create([
    		'id_tag' => 4,
    		'id_product' => 2
    		]);

    	Products_tags::create([
    		'id_tag' => 2,
    		'id_product' => 3
    		]);

    	Products_tags::create([
    		'id_tag' => 3,
    		'id_product' => 3
    		]);

    	Products_tags::create([
    		'id_tag' => 2,
    		'id_product' => 4
    		]);

    	Products_tags::create([
    		'id_tag' => 4,
    		'id_product' => 4
    		]);

    	$this->command->info('Demo Products tags createds!');
    }
}
