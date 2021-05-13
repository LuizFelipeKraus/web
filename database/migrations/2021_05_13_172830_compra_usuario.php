<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompraUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compra', function(Blueprint $table){
            $table->foreignId('id_usuario')->constrained('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compra', function(Blueprint $table){
            $table->dropForeign(['id_usuario']);
            $table->dropColumn('id_usuario');
        });
    }
}
