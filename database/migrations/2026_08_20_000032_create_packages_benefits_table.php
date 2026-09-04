<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('packages_benefits')) {
            return;
        }

        Schema::create('packages_benefits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('package_id')->nullable();
            $table->text('benefit_description')->nullable();

            $table->foreign('package_id')
                ->references('id')->on('packages');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages_benefits');
    }
};
