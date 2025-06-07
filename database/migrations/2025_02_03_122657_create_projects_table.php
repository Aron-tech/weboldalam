<?php

use App\Enums\ProjectTypesEnum;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('github')->nullable();
            $table->string('demo')->nullable();
            $table->string('slug')->unique();
            $table->string('cover');
            $table->json('images')->nullable();
            $table->enum('status', array_map(fn($case) => $case->value, ProjectTypesEnum::cases()))->default(ProjectTypesEnum::ACTIVE->value);
            $table->boolean('visible')->default(true);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
