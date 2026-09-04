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
            $table->enum('status', ['draft', 'published'])
                ->default('published')
                ->after('service_cat_id');
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

        /*
        |--------------------------------------------------------------------------
        | about_services
        |--------------------------------------------------------------------------
        */

        // Foreign key temporarily remove karo
        Schema::table('about_services', function (Blueprint $table) {
            $table->dropForeign(['main_service_id']);
        });

        // Column nullable karo
        Schema::table('about_services', function (Blueprint $table) {
            $table->integer('main_service_id')->nullable()->change();
            $table->string('title')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('icon_class', 100)->nullable()->change();
        });

        // Foreign key dobara add karo
        Schema::table('about_services', function (Blueprint $table) {
            $table->foreign('main_service_id')
                ->references('id')
                ->on('main_service')
                ->onDelete('cascade');
        });

        /*
        |--------------------------------------------------------------------------
        | why_choose_us
        |--------------------------------------------------------------------------
        */

        Schema::table('why_choose_us', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->string('icon')->nullable()->change();
            $table->text('description')->nullable()->change();
        });

        /*
        |--------------------------------------------------------------------------
        | tab_content
        |--------------------------------------------------------------------------
        */

        // Foreign key temporarily remove karo
        Schema::table('tab_content', function (Blueprint $table) {
            $table->dropForeign(['main_service_id']);
        });

        // Column nullable karo
        Schema::table('tab_content', function (Blueprint $table) {
            $table->integer('main_service_id')->nullable()->change();
            $table->string('title')->nullable()->change();
        });

        // Foreign key dobara add karo
        Schema::table('tab_content', function (Blueprint $table) {
            $table->foreign('main_service_id')
                ->references('id')
                ->on('main_service')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('about_services', function (Blueprint $table) {
            $table->dropForeign(['main_service_id']);
        });

        Schema::table('tab_content', function (Blueprint $table) {
            $table->dropForeign(['main_service_id']);
        });

        Schema::table('main_service', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
