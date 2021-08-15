<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('section_id')->unsigned();
            $table->string('name', 250);
            $table->string('description', 1000);
            $table->string('conditions', 1000);
            $table->integer('amount_people');
            $table->float('price', 8, 2);
            $table->string('url_image1')->nullable();
            $table->string('url_image2')->nullable();
            $table->string('url_image3')->nullable();

            $table->string('url_video')->nullable();;
            
            $table->foreign('section_id')->references('id')->on('section_packages');
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
        Schema::dropIfExists('packages');
    }
}
