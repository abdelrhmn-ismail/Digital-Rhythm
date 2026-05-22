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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
            $table->json('title');
            $table->json('description');
            $table->json('client')->nullable();
            $table->string('image_path')->nullable();
            $table->json('images')->nullable();
            $table->string('project_url')->nullable();
            $table->date('completed_date')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->index('is_active');
            $table->index('is_featured');
            $table->index('order');
            $table->index('service_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
