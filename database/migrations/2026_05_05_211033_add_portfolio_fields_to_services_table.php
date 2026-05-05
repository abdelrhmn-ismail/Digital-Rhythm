<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->json('client')->nullable()->after('content');
            $table->date('completed_date')->nullable()->after('client');
            $table->string('project_url')->nullable()->after('completed_date');
            $table->json('technologies')->nullable()->after('project_url');
            $table->json('images')->nullable()->after('technologies');
            $table->string('thumbnail')->nullable()->after('images');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['client', 'completed_date', 'project_url', 'technologies', 'images', 'thumbnail']);
        });
    }
};
