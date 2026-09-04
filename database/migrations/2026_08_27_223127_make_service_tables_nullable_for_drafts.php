<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('main_service', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->integer('service_cat_id')->nullable()->change();
            $table->enum('status', ['draft', 'published'])->default('published')->after('service_cat_id');
        });

        Schema::table('test_order', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->text('step_1')->nullable()->change();
            $table->text('step_2')->nullable()->change();
            $table->text('step_3')->nullable()->change();
            $table->text('step_4')->nullable()->change();
        });

        Schema::table('order_features', function (Blueprint $table) {
            $table->string('feature_title')->nullable()->change();
        });

        Schema::table('about_services', function (Blueprint $table) {
            $table->integer('main_service_id')->nullable()->change();
            $table->string('title')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('icon_class', 100)->nullable()->change();
        });

        Schema::table('why_choose_us', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->string('icon')->nullable()->change();
            $table->text('description')->nullable()->change();
        });

        Schema::table('tab_content', function (Blueprint $table) {
            $table->integer('main_service_id')->nullable()->change();
            $table->string('title')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('main_service', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        // Baqi columns ko wapas NOT NULL karna data-dependent hai —
        // agar ab tak null values ban chuki hain to rollback fail hoga.
        // Zaroorat par manually handle karein.
    }
};