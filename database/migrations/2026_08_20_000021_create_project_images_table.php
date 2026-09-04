<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('project_images')) {
            return;
        }

        Schema::create('project_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');
            $table->string('alt_text')->nullable();
            $table->text('caption')->nullable();
            $table->string('uploaded_by', 100)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_images');
    }
};
