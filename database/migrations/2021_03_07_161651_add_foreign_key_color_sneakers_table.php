<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyColorSneakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('color_sneakers', function (Blueprint $table) {
                        $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('sneaker_id')->references('id')->on('sneakers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('color_sneakers', function (Blueprint $table) {
            //
        });
    }
}
