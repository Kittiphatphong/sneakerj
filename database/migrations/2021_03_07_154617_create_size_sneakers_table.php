<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizeSneakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_sneakers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sneaker_id');
            $table->unsignedBigInteger('size_id');
            $table->foreign('sneaker_id')->references('id')->on('sneakers')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
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
        Schema::dropIfExists('size_sneakers');
    }
}
