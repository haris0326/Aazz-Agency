<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('blogs')) return;

        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blog_category_id')->nullable();
            $table->integer('author_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('tags')->nullable();
            // draft rows are real, incomplete blogs — never shown publicly until published
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->unsignedInteger('views')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            // main_service.id / users.id dono signed int(11) hain (pichli
            // conversation se confirm), isliye plain integer() use kiya —
            // unsignedInteger() FK type-mismatch error dega.
            $table->foreign('blog_category_id')
                ->references('id')->on('blog_categories')
                ->onDelete('set null');

            $table->foreign('author_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};