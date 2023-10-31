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
        Schema::create('player_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            //$table->phoneNumber('phone_number');
            //$table->dateTime('date_of_birth');
            $table->bigInteger('player_id')->unsigned();
            $table->timestamps();
            $table->foreign('player_id')->references('id')->on('players')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_profiles');
    }
};
