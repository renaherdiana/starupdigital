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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');            // Nama partner
            $table->text('description');       // Deskripsi partner
            $table->string('photo')->nullable(); // Foto partner (nullable)
            $table->boolean('is_active')->default(1); // Status aktif/inaktif
            $table->timestamps();              // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
