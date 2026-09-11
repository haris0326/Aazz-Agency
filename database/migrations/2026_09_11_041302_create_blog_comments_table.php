<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();

            /*
             * blogs.id is created with:
             * $table->increments('id');
             *
             * Therefore blog_id must be unsignedInteger(),
             * not foreignId() / unsignedBigInteger().
             */
            $table->unsignedInteger('blog_id');

            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs')
                ->cascadeOnDelete();

            /*
             * Commenter information
             */
            $table->string('name', 100);
            $table->string('email', 255);

            /*
             * Comment body.
             *
             * Application validation should enforce:
             * - minimum 5 characters
             * - maximum 3000 characters
             */
            $table->text('message');

            /*
             * Moderation status:
             *
             * pending  = waiting for admin approval
             * approved = visible publicly
             * rejected = rejected/hidden
             */
            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
            ])->default('pending')->index();

            /*
             * Useful for spam/security tracking.
             * IPv4 and IPv6 are both supported.
             */
            $table->string('ip_address', 45)->nullable();

            $table->timestamps();

            /*
             * Useful index for loading comments for a blog
             * ordered/filtering by moderation status.
             */
            $table->index(
                ['blog_id', 'status', 'created_at'],
                'blog_comments_blog_status_created_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_comments');
    }
};
