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
        Schema::create('shares', function (Blueprint $table) {
            $table->id();

            $table->foreignId('owner_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('target_user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('file_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('folder_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('role', ['viewer', 'editor']);

            $table->timestamps();

            $table->index(['target_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shares');
    }
};
