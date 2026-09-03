<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_page', function (Blueprint $table) {
            $table->string('hero_cta_primary_text')->nullable()->after('hero_bullets');
            $table->string('hero_cta_secondary_text')->nullable()->after('hero_cta_primary_text');
        });
    }

    public function down(): void
    {
        Schema::table('landing_page', function (Blueprint $table) {
            $table->dropColumn(['hero_cta_primary_text', 'hero_cta_secondary_text']);
        });
    }
};
