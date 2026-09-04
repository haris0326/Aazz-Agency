<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('pkg_meta_info')) {
            return;
        }

        Schema::create('pkg_meta_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_name', 100)->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('slug', 100)->unique()->nullable();
            $table->unsignedInteger('pkg_category_id')->nullable();

            $table->foreign('pkg_category_id')
                ->references('id')->on('packages_category')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pkg_meta_info');
    }
};
