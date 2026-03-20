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
        Schema::table('media', function (Blueprint $table) {
            // Since we're on Postgres, we need a raw statement to change bigint to uuid/string
            if (DB::getDriverName() === 'pgsql') {
                DB::statement('ALTER TABLE media ALTER COLUMN model_id TYPE varchar(255)');
            } else {
                $table->string('model_id')->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('media', function (Blueprint $table) {
            if (DB::getDriverName() === 'pgsql') {
                DB::statement('ALTER TABLE media ALTER COLUMN model_id TYPE bigint USING model_id::bigint');
            } else {
                $table->unsignedBigInteger('model_id')->change();
            }
        });
    }
};
