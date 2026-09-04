<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('tech_technologies')) {
            return;
        }

        Schema::create('tech_technologies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('type_id');
            $table->string('icon_type', 100)->default('svg');
            $table->text('icon_svg')->nullable()->default(null);
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('type_id')
                ->references('id')->on('tech_types');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tech_technologies');
    }
};
