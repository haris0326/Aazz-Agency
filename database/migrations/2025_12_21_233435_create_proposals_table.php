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
        if (Schema::hasTable('proposals')) {
            return;
        }

        Schema::create('proposals', function (Blueprint $table) {
            $table->id();

            // Personal & Company Info
            $table->string('full_name');
            $table->string('company');
            $table->string('website')->nullable();
            $table->string('email');

            // Phone Info
            $table->string('country_code', 10);
            $table->string('phone', 20);

            // Budget
            $table->enum('budget', ['under-1k','1k-5k','5k-10k','10k-plus']);

            // Services
            $table->json('services');
            $table->string('other_service')->nullable();

            // Additional comments
            $table->text('comments')->nullable();

            // Agreement
            $table->boolean('agreement')->default(false);

            $table->enum('status', ['New Lead', 'Contacted', 'Qualified'])
                  ->default('New Lead');

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
