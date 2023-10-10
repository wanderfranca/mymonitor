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
        Schema::create('lojas', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome');
        });
    }

    public function down(): void
    {
        Schema::dropDatabaseIfExists('lojas');
    }
};
