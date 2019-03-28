<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model 
{

    protected $table = 'tahun_akademik';
    public $timestamps = true;
    protected $fillable = array('nama', 'status');

}