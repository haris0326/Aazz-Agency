<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('pkg_content')) {
            return;
        }

        Schema::create('pkg_content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('pkg_content')->nullable();
            $table->unsignedInteger('pkg_category_id')->nullable();

            $table->foreign('pkg_category_id')
                ->references('id')->on('packages_category')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pkg_content');
    }
};
