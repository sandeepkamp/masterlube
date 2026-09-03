<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_page', function (Blueprint $table) {
            $table->json('why_choose_grid')->nullable()->after('why_choose_body');
        });
    }

    public function down(): void
    {
        Schema::table('home_page', function (Blueprint $table) {
            $table->dropColumn('why_choose_grid');
        });
    }
};
