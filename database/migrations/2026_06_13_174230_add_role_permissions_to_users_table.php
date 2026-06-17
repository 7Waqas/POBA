<?php
// FILE: database/migrations/2024_01_02_000001_add_role_permissions_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // 'superadmin' = full access, 'admin' = limited access
            $table->enum('role', ['superadmin', 'admin'])->default('admin')->after('gender');

            // JSON array of permission keys this admin is allowed to access
            // e.g. ["news","gallery","events","alumni_users","verticals","promotions","faqs","contact","homepage","about","admin_users","seo","footer"]
            $table->json('permissions')->nullable()->after('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'permissions']);
        });
    }
};
