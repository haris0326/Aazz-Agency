<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('order_features')) {
            return;
        }

        Schema::create('order_features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('feature_title');
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
        Schema::dropIfExists('order_features');
    }
};
