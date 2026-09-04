<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('home_why_choose_us')) {
            return;
        }

        Schema::create('home_why_choose_us', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('icon');
            $table->text('description');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_why_choose_us');
    }
};
