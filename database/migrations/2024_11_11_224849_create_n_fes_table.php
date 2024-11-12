<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNfesTable extends Migration
{
    public function up()
    {
        Schema::create('nfes', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->date('data_emissao');
            $table->string('cliente');
            $table->decimal('valor_total', 10, 2);
            $table->text('xml_content')->nullable();
            $table->text('sefaz_response')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nfes');
    }
}
