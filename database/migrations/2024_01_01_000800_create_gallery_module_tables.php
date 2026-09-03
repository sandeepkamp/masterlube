<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('magazines', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('cover_image')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->timestamps();
        });

        Schema::create('magazine_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('magazine_id')->constrained()->cascadeOnDelete();
            $table->string('image');
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();

            $table->index(['magazine_id', 'order']);
        });

        Schema::create('installs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('caption')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->timestamps();
        });

        Schema::create('install_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('install_id')->constrained()->cascadeOnDelete();
            $table->string('image');
            $table->string('caption')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();

            $table->index(['install_id', 'order']);
        });

        Schema::create('car_club_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover_image')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->timestamps();
        });

        Schema::create('car_club_event_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_club_event_id')->constrained()->cascadeOnDelete();
            $table->string('image');
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();

            $table->index(['car_club_event_id', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_club_event_photos');
        Schema::dropIfExists('car_club_events');
        Schema::dropIfExists('install_photos');
        Schema::dropIfExists('installs');
        Schema::dropIfExists('magazine_pages');
        Schema::dropIfExists('magazines');
    }
};
