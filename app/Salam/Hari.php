<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Hari extends Model 
{

    protected $table = 'hari';
    public $timestamps = true;
    protected $fillable = array('kode_hari', 'nama_idn', 'nama_eng');

}