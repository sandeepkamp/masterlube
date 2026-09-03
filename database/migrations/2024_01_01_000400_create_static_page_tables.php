<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_page', function (Blueprint $table) {
            $table->id();
            $table->string('hero_eyebrow')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_text')->nullable();
            $table->string('hero_image')->nullable();
            $table->json('feature_grid')->nullable();
            $table->string('why_choose_title')->nullable();
            $table->text('why_choose_body')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('about_page', function (Blueprint $table) {
            $table->id();
            $table->longText('story_body')->nullable();
            $table->json('drives_us_grid')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('contact_page', function (Blueprint $table) {
            $table->id();
            $table->text('shipping_address')->nullable();
            $table->string('ordering_phone')->nullable();
            $table->string('ordering_email')->nullable();
            $table->string('tech_phone')->nullable();
            $table->string('tech_email')->nullable();
            $table->string('dealer_phone')->nullable();
            $table->string('dealer_email')->nullable();
            $table->text('intro_text')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('systems_page', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->json('includes_list')->nullable();
            $table->json('options_list')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('advantages_page', function (Blueprint $table) {
            $table->id();
            $table->text('intro_body')->nullable();
            $table->json('feature_grid')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('applications_hub_page', function (Blueprint $table) {
            $table->id();
            $table->string('intro_title')->nullable();
            $table->text('intro_body')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('prelube_page', function (Blueprint $table) {
            $table->id();
            $table->text('caption')->nullable();
            $table->string('benefit_1_icon')->nullable();
            $table->string('benefit_1_text')->nullable();
            $table->string('benefit_2_icon')->nullable();
            $table->string('benefit_2_text')->nullable();
            $table->string('gallery_image_1')->nullable();
            $table->string('gallery_image_2')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prelube_page');
        Schema::dropIfExists('applications_hub_page');
        Schema::dropIfExists('advantages_page');
        Schema::dropIfExists('systems_page');
        Schema::dropIfExists('contact_page');
        Schema::dropIfExists('about_page');
        Schema::dropIfExists('home_page');
    }
};
