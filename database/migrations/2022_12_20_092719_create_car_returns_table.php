<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_returns', function (Blueprint $table) {
            $table->id();
            //$table->date('date_of_return');
            $table->string('tax');
            // $table->bigInteger('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->bigInteger('car_id')->unsigned();
            // $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->bigInteger('rent_id')->unsigned();
            $table->foreign('rent_id')->references('id')->on('rents')->onDelete('cascade');
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
        Schema::dropIfExists('car_returns');
    }
};
