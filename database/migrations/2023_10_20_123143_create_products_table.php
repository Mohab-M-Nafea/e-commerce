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
        Schema::create('products', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';

            $table->id();
            $table->string('name')->unique();
            $table->unsignedFloat('price')->default(0);
            $table->string('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedFloat('rating', 2, 1)->default(0);

            $table->enum('status', ['active', 'draft', 'archived'])
                ->default('draft');

            $table->timestamps();

            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
