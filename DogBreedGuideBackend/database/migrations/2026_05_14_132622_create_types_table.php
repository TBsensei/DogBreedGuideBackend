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
        Schema::create('types', function (Blueprint $table) {
            $table->id(); // i. id: elsődleges kulcs, automatikus

            // ii. group_id: idegen kulcs, ami a groups tábla id mezőjére hivatkozik
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');

            $table->string('name', 50); // iii. name: szöveg, max 50 karakter
            $table->integer('speed'); // iv. speed: egész szám
            $table->integer('height'); // v. height: egész szám
            $table->integer('weight'); // vi. weight: egész szám
            $table->string('origin'); // vii. origin: szöveg (alapértelmezetten 255 karakter)
            $table->integer('lifetime'); // viii. lifetime: egész szám
            $table->string('colors'); // ix. colors: szöveg

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
