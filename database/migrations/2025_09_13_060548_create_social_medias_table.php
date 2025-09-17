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
        Schema::create('social_medias', function (Blueprint $table) {
            $table->id();
            $table->string('title');                  // judul section social media
            $table->text('description')->nullable(); // deskripsi section (opsional)

            // Twitter
            $table->string('twitter')->nullable();
            $table->string('twitter_image')->nullable();

            // Facebook
            $table->string('facebook')->nullable();
            $table->string('facebook_image')->nullable();

            // Linkedin
            $table->string('linkedin')->nullable();
            $table->string('linkedin_image')->nullable();

            // Instagram
            $table->string('instagram')->nullable();
            $table->string('instagram_image')->nullable();

            // Status aktif / nonaktif
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_medias');
    }
};
