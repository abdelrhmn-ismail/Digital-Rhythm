<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Services Table
        Schema::table('services', function (Blueprint $blueprint) {
            $blueprint->json('title')->change();
            $blueprint->json('description')->change();
            $blueprint->json('content')->change();
            $blueprint->json('features')->change();
        });



        // Testimonials Table
        Schema::table('testimonials', function (Blueprint $blueprint) {
            $blueprint->json('position')->change();
            $blueprint->json('company')->change();
            $blueprint->json('content')->change();
        });

        // Convert existing data to JSON format {"en": "value"}
        $this->convertExistingData();
    }

    protected function convertExistingData()
    {
        // Services
        DB::table('services')->get()->each(function ($service) {
            DB::table('services')->where('id', $service->id)->update([
                'title' => json_encode(['en' => $service->title, 'ar' => $service->title]),
                'description' => json_encode(['en' => $service->description, 'ar' => $service->description]),
                'content' => json_encode(['en' => $service->content, 'ar' => $service->content]),
                'features' => json_encode(['en' => json_decode($service->features, true) ?? [], 'ar' => []]),
            ]);
        });



        // Testimonials
        DB::table('testimonials')->get()->each(function ($testimonial) {
            DB::table('testimonials')->where('id', $testimonial->id)->update([
                'position' => json_encode(['en' => $testimonial->position, 'ar' => $testimonial->position]),
                'company' => json_encode(['en' => $testimonial->company, 'ar' => $testimonial->company]),
                'content' => json_encode(['en' => $testimonial->content, 'ar' => $testimonial->content]),
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverting this is complex because we converted data to JSON. 
        // For simplicity, we just change types back, but data would be JSON strings.
        Schema::table('services', function (Blueprint $blueprint) {
            $blueprint->text('title')->change();
            $blueprint->text('description')->change();
            $blueprint->longText('content')->change();
            $blueprint->json('features')->change();
        });



        Schema::table('testimonials', function (Blueprint $blueprint) {
            $blueprint->text('position')->change();
            $blueprint->text('company')->change();
            $blueprint->text('content')->change();
        });
    }
};
