<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checklistItems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checklistId');
            $table->string('name');
            $table->boolean('isCompleted')->default(false);
            $table->foreign('checklistId')->references('id')->on('checklist')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklistItems');
    }
};
