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
            $table->dropColumn(['client', 'completed_date', 'project_url', 'technologies', 'images', 'thumbnail']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->json('client')->nullable();
            $table->date('completed_date')->nullable();
            $table->string('project_url')->nullable();
            $table->json('technologies')->nullable();
            $table->json('images')->nullable();
            $table->string('thumbnail')->nullable();
        });
    }
};
