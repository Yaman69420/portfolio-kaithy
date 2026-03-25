<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Default values
        DB::table('site_settings')->insert([
            ['key' => 'site_name',          'value' => 'Kaithy',         'created_at' => now(), 'updated_at' => now()],
            ['key' => 'bio_name',           'value' => 'Kaithy',         'created_at' => now(), 'updated_at' => now()],
            ['key' => 'bio_subtitle',       'value' => '',               'created_at' => now(), 'updated_at' => now()],
            ['key' => 'bio_text',           'value' => '',               'created_at' => now(), 'updated_at' => now()],
            ['key' => 'instagram_handle',   'value' => '@kaithy_art',    'created_at' => now(), 'updated_at' => now()],
            ['key' => 'instagram_url',      'value' => 'https://instagram.com/kaithy_art', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
