<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('service_drafts')) {
            return;
        }

        Schema::create('service_drafts', function (Blueprint $table) {
            $table->id();

            $table->uuid('draft_uuid')->unique();

            // main_service.id = UNSIGNED INT
            $table->unsignedInteger('service_id')
                ->nullable()
                ->index();

            $table->enum('form_type', ['create', 'edit'])
                ->default('create');

            // users.id = UNSIGNED BIGINT
            $table->unsignedBigInteger('created_by')
                ->nullable()
                ->index();

            $table->json('payload')->nullable();

            $table->timestamp('last_saved_at')->nullable();

            $table->timestamps();

            $table->foreign('service_id')
                ->references('id')
                ->on('main_service')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_drafts');
    }
};
