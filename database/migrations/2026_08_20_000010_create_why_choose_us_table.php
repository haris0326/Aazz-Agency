<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('why_choose_us')) {
            return;
        }

        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('icon');
            $table->text('description');
            $table->unsignedInteger('service_id')->nullable();

            $table->foreign('service_id')
                ->references('id')->on('main_service');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('why_choose_us');
    }
};
