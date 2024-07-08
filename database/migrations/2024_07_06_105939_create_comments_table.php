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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->text('content');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Reference to users table, nullable
            $table->string('user_name')->nullable(); // Name of the user if not registered
            $table->string('user_email')->nullable(); // Email of the user if not registered
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade'); // Reference to itself for nested comments
            $table->foreignId('quoted_comment_id')->nullable()->constrained('comments')->onDelete('cascade'); // Reference to quoted comment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};