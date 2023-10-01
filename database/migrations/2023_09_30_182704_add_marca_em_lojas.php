<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('lojas', function($table) {
            $table->string('marca', 100);
        });
    }

    public function down()
    {
        Schema::table('lojas', function($table) {
            $table->dropColumn('marca');
        });
    }
};
