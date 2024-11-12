<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID auto-incrementável
            $table->string('name'); // Nome do produto
            $table->decimal('price', 10, 2); // Preço do produto com 2 casas decimais
            $table->string('description')->nullable(); // Descrição do produto (opcional)
            $table->decimal('tax', 5, 2)->default(0); // Imposto, com valor default de 0
            $table->integer('stock')->default(0); // Estoque do produto
            $table->timestamps(); // Data de criação e atualização
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}