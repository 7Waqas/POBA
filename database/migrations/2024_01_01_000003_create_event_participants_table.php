<?php
// FILE: database/migrations/2024_01_01_000003_create_gallery_tables.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('gallery_folders', function (Blueprint $table) {
            $table->id();
            $table->string('folder_name');
            $table->text('description')->nullable();
            $table->enum('type', ['Conference','Private','Public'])->default('Public');
            $table->string('class_year')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->timestamps();
        });

        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_folder_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['executive','working'])->default('working');
            $table->timestamps();
        });

        Schema::create('committee_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('committee_id')->constrained()->onDelete('cascade');
            $table->string('member_name');
            $table->string('member_url')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->date('expiry_date')->nullable();
            $table->time('expiry_time')->nullable();
            $table->timestamps();
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->longText('answer');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('cms_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('cms_settings');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('promotions');
        Schema::dropIfExists('committee_members');
        Schema::dropIfExists('committees');
        Schema::dropIfExists('news');
        Schema::dropIfExists('gallery_images');
        Schema::dropIfExists('gallery_folders');
    }
};
