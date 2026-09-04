<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('pkg_cat_faq')) {
            return;
        }

        Schema::create('pkg_cat_faq', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question', 555);
            $table->text('answer');
            $table->unsignedInteger('pkg_category_id')->nullable();

            $table->foreign('pkg_category_id')
                ->references('id')->on('packages_category')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pkg_cat_faq');
    }
};
