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
            $table->foreignId('client_id')->constrained('clients');
            $table->decimal('total_amount', 10, 2);
            $table->string('status')->default('pending');
            $table->string('xml_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nfes');
    }
}
