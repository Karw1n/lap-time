<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('team');
            $table->string('model');
            $table->timestamps();


            //Players' who have driven the car
            $table->bigIntger('driven_by')->unsigned();
            $table->foreign('driven_by')->references('id')->on('players')
                ->onDelete('cascade')->onUpdate('cascade');

            //Laps' the car has been used on
            $table->bigInter('lap_id')->unsigned();
            $table->foreign('lap_id')->references('id')->on('laps')
                ->onDelete('cascade')->onUpdate('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
