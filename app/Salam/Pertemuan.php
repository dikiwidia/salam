<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model 
{

    protected $table = 'pertemuan';
    public $timestamps = true;
    protected $fillable = array('nama');

}