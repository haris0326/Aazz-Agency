<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('client_logos')) {
            return;
        }

        Schema::create('client_logos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description', 500);
            $table->string('logo_image')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_logos');
    }
};
