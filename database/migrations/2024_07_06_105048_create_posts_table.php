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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('slug');
            $table->string('title');
            $table->text('content');
            $table->string('type')->default('text'); // 'text', 'video', etc.
            $table->string('tags')->nullable(); // Storing tags as a comma-separated string
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Reference to users table, nullable
            $table->string('user_name')->nullable(); // Name of the user if not registered
            $table->string('image')->nullable(); // URL or path to the image
            $table->boolean('allow_comments')->default(true); // Allow or disallow comments
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('classification_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};