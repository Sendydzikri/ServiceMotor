<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_detailtransaksi extends Model
{
    public $incrementing = false; 
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'nomor';
    public $timestamps = false;
    protected $fillable = ['id_transaksi','id_user','tgl_transaksi','nama_customer','plat_nomor','id_sukucadang','nama_mekanik','harga','merk_motor','status'];
}
