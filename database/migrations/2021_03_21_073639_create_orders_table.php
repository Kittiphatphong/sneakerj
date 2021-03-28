<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sneaker_id');
            $table->unsignedBigInteger('size_id');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->double('price');
            $table->string('facebook')->nullable();
            $table->date('shipDate')->nullable();
            $table->string('remark')->nullable();
            $table->string('comment')->nullable();
//            $table->foreign('sneaker_id')->references('id')->on('sneakers')->onDelete('cascade');
//            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
