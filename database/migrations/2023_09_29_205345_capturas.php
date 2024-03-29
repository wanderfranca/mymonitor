<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('capturas', function(Blueprint $table){
            $table->increments('id');
            $table->string('loja');
            $table->string('host');
            $table->string('tipohost')->nullable();
            $table->string('ip')->nullable();
            $table->string('down')->nullable();
            $table->string('up')->nullable();
            $table->string('regiao')->nullable();
            $table->string('teamviewer')->nullable();
            $table->string('anydesk')->nullable();
            $table->string('marca')->nullable();
            $table->dateTime('datahora')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('capturas');
    }
};
