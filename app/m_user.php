<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_user extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = ['nama_user','username','password','role'];
}
