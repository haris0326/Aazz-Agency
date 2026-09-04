<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('test_order')) {
            return;
        }

        // NOTE: original raw-SQL schema had a single `image VARCHAR(255)`
        // column here, but the controller/model actually read/write an
        // `images` JSON column (multiple uploads). This create migration
        // matches your ORIGINAL raw SQL for historical accuracy; the fix
        // is applied separately in 2026_08_20_000039_fix_test_order_images_column.php
        Schema::create('test_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('step_1');
            $table->text('step_2');
            $table->text('step_3');
            $table->text('step_4');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('test_order');
    }
};
