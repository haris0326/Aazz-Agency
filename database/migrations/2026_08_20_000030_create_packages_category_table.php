<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('packages_category')) {
            return;
        }

        Schema::create('packages_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages_category');
    }
};
