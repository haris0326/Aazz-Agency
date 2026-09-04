<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('company_specializing')) {
            return;
        }

        Schema::create('company_specializing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('icon_class', 100);
            $table->string('button_link')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_specializing');
    }
};
