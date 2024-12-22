<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
        $table->string('name');
        $table->text('description');
        $table->decimal('price', 8, 2); // To store price with 2 decimal points
        $table->string('image')->nullable(); // Image field (nullable in case no image is provided)
        $table->timestamps(); // For created_at and updated_at
    
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
