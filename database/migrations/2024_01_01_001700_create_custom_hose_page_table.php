<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('custom_hose_page', function (Blueprint $table) {
            $table->id();
            $table->string('banner_eyebrow')->nullable();
            $table->string('banner_title')->nullable();
            $table->text('banner_text')->nullable();
            $table->string('other_stuff_heading')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_hose_page');
    }
};
