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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');                 // Judul about
            $table->text('description');             // Deskripsi about
            $table->string('photo')->nullable();     // Foto opsional
            $table->integer('experience')->nullable()->default(0); // Years experience
            $table->integer('customers')->nullable()->default(0);  // Happy customers
            $table->string('phone')->nullable();     // Nomor telepon
            $table->boolean('is_active')->default(1);// Status aktif/tidak
            $table->timestamps();                    // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
