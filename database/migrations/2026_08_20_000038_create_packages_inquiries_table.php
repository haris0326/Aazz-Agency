<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('packages_inquiries')) {
            return;
        }

        Schema::create('packages_inquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pkg_category_id')->nullable();
            $table->unsignedInteger('pkg_id')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('pkg_category_id')
                ->references('id')->on('packages_category')
                ->onDelete('cascade');

            $table->foreign('pkg_id')
                ->references('id')->on('packages')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages_inquiries');
    }
};
