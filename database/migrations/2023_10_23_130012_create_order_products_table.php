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
        Schema::create('order_products', function (Blueprint $table) {
            $table->collation = 'utf8mb4_general_ci';

            $table->id();
            $table->string('name');
            $table->float('price');
            $table->string('excerpt')->nullable();
            $table->unsignedInteger('quantity');
            $table->float('total');

            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnUpdate();

            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
