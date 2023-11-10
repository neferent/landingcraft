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
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('key')->default('null');
            $table->string('meta_title')->default('null');
            $table->string('meta_description')->default('null');
            $table->json('keywords');
            $table->boolean('allow_robots')->default(false);
            $table->string('canonical')->default('null');
            $table->string('og_title')->default('null');
            $table->string('og_description')->default('null');
            $table->string('og_image')->default('null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seos');
    }
};
