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
        Schema::table('social_medias', function (Blueprint $table) {
            $table->string('twitter_url')->nullable()->after('twitter_username');
            $table->string('facebook_url')->nullable()->after('facebook_username');
            $table->string('linkedin_url')->nullable()->after('linkedin_username');
            $table->string('instagram_url')->nullable()->after('instagram_username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('social_medias', function (Blueprint $table) {
            $table->dropColumn([
                'twitter_url',
                'facebook_url',
                'linkedin_url',
                'instagram_url',
            ]);
        });
    }
};
