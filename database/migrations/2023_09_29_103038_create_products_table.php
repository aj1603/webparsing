<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('imgUrl');
            $table->float('price');
            $table->string('brand');
            $table->timestamps();
        });

        Schema::create('product_size', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('products_id');
            $table->string('size_1');
            $table->string('size_2');
            $table->string('size_3');
            $table->string('size_4');
            $table->string('size_5');
            $table->timestamps();
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
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
