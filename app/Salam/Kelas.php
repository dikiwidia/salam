<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model 
{

    protected $table = 'kelas';
    public $timestamps = true;
    protected $fillable = array('kode_kelas', 'nama', 'kapasitas', 'jenjang', 'wali_kelas');

    public function getGuru()
    {
        return $this->belongsTo('App\Salam\Guru', 'wali_kelas');
    }

}