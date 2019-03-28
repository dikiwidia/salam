<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model 
{

    protected $table = 'mapel';
    public $timestamps = true;
    protected $fillable = array('kode_mapel', 'nama_idn', 'nama_eng', 'sks', 'status');

}