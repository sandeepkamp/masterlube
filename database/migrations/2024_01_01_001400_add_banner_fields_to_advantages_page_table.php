<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('advantages_page', function (Blueprint $table) {
            $table->string('banner_eyebrow')->nullable()->before('intro_body');
            $table->string('banner_title')->nullable()->before('intro_body');
            $table->string('features_heading')->nullable()->after('feature_grid');
            $table->string('testimonials_eyebrow')->nullable()->after('features_heading');
            $table->string('testimonials_title')->nullable()->after('testimonials_eyebrow');
        });
    }

    public function down(): void
    {
        Schema::table('advantages_page', function (Blueprint $table) {
            $table->dropColumn(['banner_eyebrow', 'banner_title', 'features_heading', 'testimonials_eyebrow', 'testimonials_title']);
        });
    }
};
