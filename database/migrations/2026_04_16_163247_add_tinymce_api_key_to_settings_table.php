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
        \App\Models\Setting::updateOrCreate(
            ['key' => 'tinymce_api_key'],
            ['value' => 'd6p619q500usx6xzhjjcjffco74pupud9d9fu4vesw6famkq']
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \App\Models\Setting::where('key', 'tinymce_api_key')->delete();
    }
};
