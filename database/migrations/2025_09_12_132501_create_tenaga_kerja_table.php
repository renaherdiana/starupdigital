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
        Schema::create('tenaga_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('name');                 // Nama tenaga kerja
            $table->string('photo')->nullable();    // Path foto, nullable
            $table->string('profession');           // Profesi
            $table->boolean('is_active')->default(true); // Status aktif default true
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenaga_kerja');
    }
};
