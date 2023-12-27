<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePumaproducts1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pumaproducts1', function (Blueprint $table) {
            $table->increments('id');
            $table->string('productcode');
            $table->string('name');
            $table->float('orginalprice');
            $table->float('price');
            $table->integer('quantity');
            $table->string('status');
            $table->string('maincat');
            $table->string('seccat');
            $table->string('language');
            $table->string('description');
            $table->string('imgUrl');
            $table->string('size');
            $table->string('brand');
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
        Schema::dropIfExists('pumaproducts1');
    }
}
