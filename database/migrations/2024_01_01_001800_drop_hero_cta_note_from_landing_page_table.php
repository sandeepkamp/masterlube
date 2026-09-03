<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('landing_page', 'hero_cta_note')) {
            Schema::table('landing_page', function (Blueprint $table) {
                $table->dropColumn('hero_cta_note');
            });
        }
    }

    public function down(): void
    {
        Schema::table('landing_page', function (Blueprint $table) {
            $table->string('hero_cta_note')->nullable()->after('hero_bullets');
        });
    }
};
