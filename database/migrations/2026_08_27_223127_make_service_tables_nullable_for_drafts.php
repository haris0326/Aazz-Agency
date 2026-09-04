<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | main_service
        |--------------------------------------------------------------------------
        */

        Schema::table('main_service', function (Blueprint $table) {
            // FK ko pehle drop karna zaroori hai
            $table->dropForeign(['service_cat_id']);
        });

        Schema::table('main_service', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->unsignedInteger('service_cat_id')->nullable()->change();

            if (!Schema::hasColumn('main_service', 'status')) {
                $table->enum('status', ['draft', 'published'])
                    ->default('published')
                    ->after('service_cat_id');
            }
        });

        // FK ko nullable column ke saath dobara create karo
        Schema::table('main_service', function (Blueprint $table) {
            $table->foreign('service_cat_id')
                ->references('id')
                ->on('service_category')
                ->onDelete('cascade');
        });


        /*
        |--------------------------------------------------------------------------
        | test_order
        |--------------------------------------------------------------------------
        */

        Schema::table('test_order', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->text('step_1')->nullable()->change();
            $table->text('step_2')->nullable()->change();
            $table->text('step_3')->nullable()->change();
            $table->text('step_4')->nullable()->change();
        });


        /*
        |--------------------------------------------------------------------------
        | order_features
        |--------------------------------------------------------------------------
        */

        Schema::table('order_features', function (Blueprint $table) {
            $table->string('feature_title')->nullable()->change();
        });


        /*
        |--------------------------------------------------------------------------
        | about_services
        |--------------------------------------------------------------------------
        */

        Schema::table('about_services', function (Blueprint $table) {
            // FK ko pehle drop karo
            $table->dropForeign(['main_service_id']);
        });

        Schema::table('about_services', function (Blueprint $table) {
            $table->unsignedInteger('main_service_id')->nullable()->change();
            $table->string('title')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('icon_class', 100)->nullable()->change();
        });

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

        Schema::table('tab_content', function (Blueprint $table) {
            // FK ko pehle drop karo
            $table->dropForeign(['main_service_id']);
        });

        Schema::table('tab_content', function (Blueprint $table) {
            $table->unsignedInteger('main_service_id')->nullable()->change();
            $table->string('title')->nullable()->change();
        });

        Schema::table('tab_content', function (Blueprint $table) {
            $table->foreign('main_service_id')
                ->references('id')
                ->on('main_service')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('main_service', function (Blueprint $table) {
            $table->dropForeign(['service_cat_id']);
            $table->dropColumn('status');

            $table->unsignedInteger('service_cat_id')->nullable(false)->change();
            $table->string('title')->nullable(false)->change();
            $table->text('description')->nullable(false)->change();

            $table->foreign('service_cat_id')
                ->references('id')
                ->on('service_category')
                ->onDelete('cascade');
        });
    }
};
