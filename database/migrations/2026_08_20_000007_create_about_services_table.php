<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('about_services')) {
            return;
        }

        Schema::create('about_services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('main_service_id');
            $table->string('title');
            $table->text('description');
            $table->string('icon_class', 100);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('main_service_id')
                ->references('id')->on('main_service')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_services');
    }
};
