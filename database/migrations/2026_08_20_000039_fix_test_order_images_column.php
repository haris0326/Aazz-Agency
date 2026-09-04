<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Your original raw-SQL `test_order` table had a single `image VARCHAR(255)`
 * column, but TestOrder.php casts `images` to an array and
 * MainServiceController stores json_encode()'d multi-image arrays into an
 * `images` column. This migration reconciles the two:
 *   - if `images` already exists (i.e. you already fixed it manually /
 *     via phpMyAdmin), it's a no-op.
 *   - otherwise it renames `image` -> `images` (if `image` exists) and
 *     changes the type to JSON so multi-image uploads store correctly.
 */
return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('test_order')) {
            return;
        }

        if (Schema::hasColumn('test_order', 'images')) {
            return; // already correct
        }

        if (Schema::hasColumn('test_order', 'image')) {
            Schema::table('test_order', function (Blueprint $table) {
                $table->renameColumn('image', 'images');
            });
        } else {
            Schema::table('test_order', function (Blueprint $table) {
                $table->json('images')->nullable()->after('step_4');
            });
            return;
        }

        Schema::table('test_order', function (Blueprint $table) {
            $table->json('images')->nullable()->change();
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('test_order') && Schema::hasColumn('test_order', 'images')) {
            Schema::table('test_order', function (Blueprint $table) {
                $table->renameColumn('images', 'image');
            });
            Schema::table('test_order', function (Blueprint $table) {
                $table->string('image')->nullable()->change();
            });
        }
    }
};
