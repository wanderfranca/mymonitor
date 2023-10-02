<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('logs', function($table) {
            $table->string('tipohost', 100)->nullable();
        });
    }

    public function down()
    {
        Schema::table('logs', function($table) {
            $table->dropColumn('tipohost');
        });
    }
};
