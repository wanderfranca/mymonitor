<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::table('capturas', function($table) {
            $table->string('marca', 100);
        });
    }

    public function down()
    {
        Schema::table('capturas', function($table) {
            $table->dropColumn('marca');
        });
    }
};
