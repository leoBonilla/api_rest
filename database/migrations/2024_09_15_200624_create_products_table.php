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
            $table->id();
            $table->string('name'); // Nombre del producto
            $table->decimal('price', 8, 2); // Precio del producto (hasta 999,999.99)
            $table->string('photo')->nullable(); // Ruta de la foto del producto
            $table->integer('stock'); // Existencias
            $table->boolean('status')->default(true); // Estado del producto (activo o inactivo)
            $table->timestamps(); // Incluye created_at y updated_at
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
