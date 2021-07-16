<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_transaksi extends Model
{
    public $incrementing = false;    
    protected $table = 'dt_transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;
    protected $fillable = ['id_transaksi','tgl_transaksi','nama_customer','plat_nomor','nohp_cust','merk_motor','keluhan','status'];
}
