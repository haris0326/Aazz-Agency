<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('home_hero_section')) {
            return;
        }

        Schema::create('home_hero_section', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('button1_title', 100);
            $table->string('button1_link');
            $table->string('button2_title', 100);
            $table->string('button2_link');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_hero_section');
    }
};
