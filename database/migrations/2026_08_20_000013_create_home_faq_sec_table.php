<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('home_faq_sec')) {
            return;
        }

        Schema::create('home_faq_sec', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_faq_sec');
    }
};
