<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_page', function (Blueprint $table) {
            $table->json('hero_bullets')->nullable()->after('hero_text');
            $table->string('hero_cta_note')->nullable()->after('hero_bullets');
        });
    }

    public function down(): void
    {
        Schema::table('landing_page', function (Blueprint $table) {
            $table->dropColumn(['hero_bullets', 'hero_cta_note']);
        });
    }
};
