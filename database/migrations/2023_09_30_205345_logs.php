<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('logs', function(Blueprint $table){
            $table->increments('id');
            $table->string('loja');
            $table->string('host');
            $table->string('ip');
            $table->string('down');
            $table->string('up');
            $table->dateTime('datahora');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
