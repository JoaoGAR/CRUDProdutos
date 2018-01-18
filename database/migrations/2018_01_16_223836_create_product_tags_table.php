<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagsTable extends Migration
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
        Schema::create('products_tags', function (Blueprint $table) 
        {            
            $table->increments('id');
            $table->integer('id_tag')->index();
            $table->integer('id_product')->index();

            $table->foreign('id_tag')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('products_tags');
    }
}
