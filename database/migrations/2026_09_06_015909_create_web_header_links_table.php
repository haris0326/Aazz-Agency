<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('web_header_links')) return;

        Schema::create('web_header_links', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('code');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('web_header_links');
    }
};