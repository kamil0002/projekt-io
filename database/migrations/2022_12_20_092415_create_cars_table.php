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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('car_body');
            $table->string('year_of_production');
            $table->string('drive');
            $table->string('engine_power');
            $table->string('acceleration');
            $table->string('maximum_speed');
            $table->string('battery_capacity');
            $table->string('number_of_seats');
            $table->string('car_coverage');
            $table->decimal('price');
            $table->string('image')->nullable();
            $table->string('status')->default('dostepny');
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
        Schema::dropIfExists('cars');
    }
};
