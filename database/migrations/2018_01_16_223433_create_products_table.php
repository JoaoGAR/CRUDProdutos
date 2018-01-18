<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function boot()
    {
        Schema::defaultStringLength(191);
    }
    
    public function up()
    {
        Schema::create('products', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('title');
            $table->longText('description', 4000)->nullable();
            $table->string('image');
            $table->string('stock');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
