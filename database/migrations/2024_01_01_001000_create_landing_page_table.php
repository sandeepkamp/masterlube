<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_page', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->text('hero_text')->nullable();
            $table->string('stat_1_number')->nullable();
            $table->string('stat_1_label')->nullable();
            $table->string('stat_1_caption')->nullable();
            $table->string('stat_2_number')->nullable();
            $table->string('stat_2_label')->nullable();
            $table->string('stat_2_caption')->nullable();
            $table->string('showcase_title')->nullable();
            $table->string('showcase_tagline')->nullable();
            $table->json('showcase_grid')->nullable();
            $table->string('showcase_cta_text')->nullable();
            $table->string('solutions_eyebrow')->nullable();
            $table->string('solutions_title')->nullable();
            $table->text('solutions_subtitle')->nullable();
            $table->json('solutions_grid')->nullable();
            $table->string('testimonials_eyebrow')->nullable();
            $table->string('testimonials_title')->nullable();
            $table->string('trust_label')->nullable();
            $table->string('cta_eyebrow')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_text')->nullable();
            $table->string('footer_text')->nullable();
            $table->json('footer_badges')->nullable();
            $table->string('copyright_text')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_page');
    }
};
