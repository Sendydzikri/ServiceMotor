<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DtSukucadang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dt_sukucadang', function (Blueprint $table) {
            $table->string('id_sukucadang',255)->primary();             
            $table->string('nama',50);
            $table->integer('harga');
            $table->integer('stock');

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
