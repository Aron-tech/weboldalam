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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->min(3);
            $table->string('description')->min(3);
            $table->text('body')->min(3)->nullabble(false);
            $table->string('github')->url()->nullable();
            $table->string('demo')->url()->nullable();
            $table->string('slug')->min(3)->unique()->nullalbe(false);
            $table->string('cover');
            $table->json('images')->nullable();
            $table->string('status')->default('inprogress');
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
