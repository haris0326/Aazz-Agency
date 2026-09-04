<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('pkg_tab_content')) {
            return;
        }

        Schema::create('pkg_tab_content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tab_title')->nullable();
            $table->text('tab_content')->nullable();
            $table->unsignedInteger('pkg_category_id')->nullable();

            $table->foreign('pkg_category_id')
                ->references('id')->on('packages_category')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pkg_tab_content');
    }
};
