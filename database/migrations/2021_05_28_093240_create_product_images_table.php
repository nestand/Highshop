<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('img');
            // id of every shop product
            $table->BigInteger('product_id')->unsigned();
            //for deleting photos of the product
            $table->foreign('product_id')
            //which product
            ->references ('id')
            //which table
            ->on('products')
            //which action
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}
