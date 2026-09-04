<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Guarded: table already exists in production (created via raw SQL).
        // This makes the migration a safe no-op there, while still creating
        // the table correctly on a fresh install / new environment.
        if (Schema::hasTable('service_category')) {
            return;
        }

        Schema::create('service_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cat_title')->nullable();
            $table->text('cat_desc')->nullable();
            $table->string('cat_slug', 100)->unique()->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_category');
    }
};
