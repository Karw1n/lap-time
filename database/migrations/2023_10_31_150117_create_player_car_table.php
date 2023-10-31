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
        Schema::create('player_car', function (Blueprint $table) {
            $table->primary(['player_id', 'car_id']);
            $table->bigInteger('player_id')->unsiged();
            $table->bigInteger('car_id')->unsigned();
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('players')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('car_id')->references('id')->on('laps')
                ->onDelete('cascade')->onUpdate('cascade');
            
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_car');
    }
};
