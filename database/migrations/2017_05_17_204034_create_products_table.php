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
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model')->unique();
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->onDelete('cascade');
            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')
                ->references('id')->on('genders')
                ->onDelete('cascade');
            $table->integer('size_id')->unsigned();
            $table->foreign('size_id')
                ->references('id')->on('sizes')
                ->onDelete('cascade');
            $table->text('description');
            $table->float('price');
            $table->tinyInteger('sale')->default(0);
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
