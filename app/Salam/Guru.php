<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model 
{

    protected $table = 'guru';
    public $timestamps = true;
    protected $fillable = array('niptk', 'kode_guru', 'nama', 'jenis_kelamin', 'alamat', 'kode_pos', 'status_perkawinan', 'status', 'src_photo');

}