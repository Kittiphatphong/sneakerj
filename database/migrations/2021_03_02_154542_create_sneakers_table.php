<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSneakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sneakers', function (Blueprint $table) {
            $table->id();
            $table->string('name_eng');
            $table->string('name_lao');
            $table->double('price_sell');
            $table->double('price_buy');
            $table->integer('year');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('type_id');
            $table->string('for');
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
        Schema::dropIfExists('sneakers');
    }
}
