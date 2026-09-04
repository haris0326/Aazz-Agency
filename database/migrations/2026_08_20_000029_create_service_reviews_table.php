<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('service_reviews')) {
            return;
        }

        Schema::create('service_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('user_name', 100);
            $table->string('user_image')->nullable()->default(null);
            $table->decimal('rating', 2, 1);
            $table->text('review_text');
            $table->unsignedInteger('category_id')->nullable();
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);

            $table->foreign('category_id')
                ->references('id')->on('service_category')
                ->onDelete('set null');
        });

        // CHECK constraints aren't part of the fluent Blueprint API in all
        // Laravel versions, so it's added as a raw statement to match the
        // original SQL exactly.
        DB::statement('ALTER TABLE service_reviews ADD CONSTRAINT chk_rating_range CHECK (rating >= 0 AND rating <= 5)');
    }

    public function down(): void
    {
        Schema::dropIfExists('service_reviews');
    }
};
