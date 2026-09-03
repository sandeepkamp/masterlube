<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_featured_on_custom_hose')->default(false);
            $table->unsignedInteger('order')->default(0);
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->timestamps();
        });

        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->timestamps();
        });

        Schema::create('partner_links', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_links');
        Schema::dropIfExists('dealers');
        Schema::dropIfExists('accessories');
    }
};
