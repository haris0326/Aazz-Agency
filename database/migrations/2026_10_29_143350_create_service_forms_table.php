
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servicesform', function (Blueprint $table) {
            $table->id();

            $table->string('full_name');
            $table->string('location')->nullable();
            $table->string('email');
            $table->string('website')->nullable();

            $table->string('country_code', 10);
            $table->string('phone', 30);

            $table->text('comments')->nullable();
            $table->text('page_url')->nullable();

            $table->string('status')->default('New Lead');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
