<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->string('id_transaksi',255);
            $table->string('id_user',50);
            $table->date('tgl_transaksi');
            $table->string('nama_customer',255);
            $table->string('plat_nomor',30);
            $table->string('id_sukucadang',255);
            $table->string('nama_mekanik',30);  
            $table->integer('harga',30);
            $table->string('merk_motor',30);                                              
        });          //
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
