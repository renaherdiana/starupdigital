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
        Schema::table('heros', function (Blueprint $table) {
            // Tambahkan kolom is_active jika belum ada
            if (!Schema::hasColumn('heros', 'is_active')) {
                $table->boolean('is_active')->default(1)->after('image');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('heros', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};
