<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('hero_section')) {
            return;
        }

        Schema::create('hero_section', function (Blueprint $table) {
            $table->increments('id');
            $table->string('main_title')->nullable();
            $table->text('main_desc')->nullable();
            $table->string('main_image')->nullable();
            $table->string('button_text', 100)->nullable();
            $table->string('button_link')->nullable();
            $table->unsignedInteger('main_service_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('main_service_id')
                ->references('id')->on('main_service')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_section');
    }
};
