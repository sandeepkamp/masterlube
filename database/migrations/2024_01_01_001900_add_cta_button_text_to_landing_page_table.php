<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_page', function (Blueprint $table) {
            $table->string('cta_primary_text')->nullable()->after('cta_text');
            $table->string('cta_secondary_text')->nullable()->after('cta_primary_text');
        });
    }

    public function down(): void
    {
        Schema::table('landing_page', function (Blueprint $table) {
            $table->dropColumn(['cta_primary_text', 'cta_secondary_text']);
        });
    }
};
