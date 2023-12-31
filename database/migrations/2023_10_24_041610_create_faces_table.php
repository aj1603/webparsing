<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faces', function (Blueprint $table) {
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
            $table->string('imgUrl', 1000);
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
        Schema::dropIfExists('faces');
    }
}
