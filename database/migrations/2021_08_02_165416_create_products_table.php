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
            $table->id();
            
            $table->bigInteger('category_id')->unsigned();
            $table->string('name', 150);
            $table->string('description', 500);
            $table->float('price', 8, 2);
            $table->string('url_image')->nullable();
            $table->integer('available');

            $table->foreign('category_id')->references('id')->on('category_products');
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
