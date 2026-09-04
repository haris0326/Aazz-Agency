<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('packages')) {
            return;
        }

        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pkg_category_id')->nullable();
            $table->string('level', 100);
            $table->string('duration');
            $table->decimal('price', 10, 2);

            $table->foreign('pkg_category_id')
                ->references('id')->on('packages_category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
