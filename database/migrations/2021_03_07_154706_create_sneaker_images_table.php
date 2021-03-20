<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSneakerImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sneaker_images', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('sneaker_id');
            $table->foreign('sneaker_id')->references('id')->on('sneakers')->onDelete('cascade');
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
        Schema::dropIfExists('sneaker_images');
    }
}
