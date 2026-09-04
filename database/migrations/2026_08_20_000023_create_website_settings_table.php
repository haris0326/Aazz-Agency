<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('website_settings')) {
            return;
        }

        Schema::create('website_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header_logo');
            $table->string('favicon');
            $table->string('footer_logo');
            $table->string('navbar_color', 7);
            $table->string('footer_color', 7);
            $table->string('cta_color', 7);
            $table->string('button_color', 7);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
