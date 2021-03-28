<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTableSneakers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sneakers', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('discount_id');
            $table->string('fullName');
//            $table->foreign('status_id')->references('statuses')->on('id')->onDelete('cascade');
//            $table->foreign('discount_id')->references('discounts')->on('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sneakers', function (Blueprint $table) {
            //
        });
    }
}
