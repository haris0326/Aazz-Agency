<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('main_service')) {
            return;
        }

        Schema::create('main_service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('service_cat_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('service_cat_id')
                ->references('id')->on('service_category')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('main_service');
    }
};
