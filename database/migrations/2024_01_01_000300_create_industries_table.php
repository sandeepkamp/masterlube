<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('nav_label')->nullable();
            $table->string('hero_eyebrow')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_text')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->longText('intro_body')->nullable();
            $table->string('intro_image')->nullable();
            $table->string('secondary_title')->nullable();
            $table->longText('secondary_body')->nullable();
            $table->string('secondary_image')->nullable();
            $table->text('callout_text')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industries');
    }
};
