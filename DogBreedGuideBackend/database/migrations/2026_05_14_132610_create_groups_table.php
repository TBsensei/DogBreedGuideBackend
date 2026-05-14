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
        Schema::create('groups', function (Blueprint $table) {
            $table->id(); // i. id: elsődleges kulcs, automatikus
            $table->string('name', 255); // ii. name: szöveg, max 255 karakter
            $table->boolean('visible')->default(true); // iii. visible: alapértelmezetten true
            $table->timestamps(); // A keretrendszer által megkövetelt alapértelmezett oszlopok
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
