<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_page', function (Blueprint $table) {
            $table->json('systems_grid')->nullable()->after('feature_grid');
            $table->string('car_clubs_title')->nullable()->after('why_choose_grid');
            $table->text('car_clubs_text')->nullable()->after('car_clubs_title');
            $table->string('car_clubs_image')->nullable()->after('car_clubs_text');
            $table->string('contact_heading')->nullable()->after('car_clubs_image');
            $table->text('contact_text')->nullable()->after('contact_heading');
        });
    }

    public function down(): void
    {
        Schema::table('home_page', function (Blueprint $table) {
            $table->dropColumn(['systems_grid', 'car_clubs_title', 'car_clubs_text', 'car_clubs_image', 'contact_heading', 'contact_text']);
        });
    }
};
