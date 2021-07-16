<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_sukucadang extends Model
{
    protected $table = 'dt_sukucadang';
    protected $primaryKey = 'id_sukucadang';
    public $timestamps = false;
    protected $fillable = ['id_sukucadang','nama','harga','stock'];
}
