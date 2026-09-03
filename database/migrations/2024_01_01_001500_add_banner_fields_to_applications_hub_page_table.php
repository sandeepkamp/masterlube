<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications_hub_page', function (Blueprint $table) {
            $table->string('banner_eyebrow')->nullable()->before('intro_title');
            $table->string('banner_title')->nullable()->before('intro_title');
            $table->text('banner_text')->nullable()->before('intro_title');
        });
    }

    public function down(): void
    {
        Schema::table('applications_hub_page', function (Blueprint $table) {
            $table->dropColumn(['banner_eyebrow', 'banner_title', 'banner_text']);
        });
    }
};
