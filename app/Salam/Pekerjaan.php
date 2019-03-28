<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model 
{

    protected $table = 'pekerjaan';
    public $timestamps = true;
    protected $fillable = array('nama');

}