<?php
// FILE: database/migrations/2024_01_01_000001_create_alumni_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('alumni_users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->integer('entry')->nullable();
            $table->string('ccp_no')->nullable();
            $table->string('house')->nullable();
            $table->string('education')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('field_of_work')->nullable();
            $table->string('current_city')->nullable();
            $table->string('current_country')->nullable();
            $table->string('current_designation')->nullable();
            $table->string('current_organization')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('achievements')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('cnic_file')->nullable();
            $table->boolean('consent_sharing')->default(false);
            $table->boolean('agree_terms')->default(false);
            $table->json('privacy_settings')->nullable();
            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_star_alumni')->default(false);
            $table->text('star_description')->nullable();
            $table->string('featured_text')->nullable();
            $table->string('class_year')->nullable();

            // FIXED: Added remember token storage to prevent SQL Column errors during authentication sessions
            $table->rememberToken();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('alumni_users');
    }
};
