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
            $table->string('twitter_username')->nullable()->after('twitter_url');
            $table->string('facebook_username')->nullable()->after('facebook_url');
            $table->string('linkedin_username')->nullable()->after('linkedin_url');
            $table->string('instagram_username')->nullable()->after('instagram_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('social_medias', function (Blueprint $table) {
            $table->dropColumn([
                'twitter_username',
                'facebook_username',
                'linkedin_username',
                'instagram_username',
            ]);
        });
    }
};
