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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('speciality_id');
            $table->string('name');
            $table->string('phone');
            $table->string('street');
            $table->string('postal_code');
            $table->string('city');
            $table->text('description');
            $table->string('slug')->nullable();
            $table->tinyInteger('trending')->default('0');
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('speciality_id')->references('id')->on('specialities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
