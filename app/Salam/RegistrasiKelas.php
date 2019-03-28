<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class RegistrasiKelas extends Model 
{

    protected $table = 'registrasi_kelas';
    public $timestamps = true;
    protected $fillable = array('nama', 'kelas', 'tahun_akademik');

    public function getSantri()
    {
        return $this->belongsTo('App\Salam\Santri', 'nama');
    }

    public function getTahunAkademik()
    {
        return $this->belongsTo('App\Salam\TahunAkademik', 'tahun_akademik');
    }

    public function getKelas()
    {
        return $this->belongsTo('App\Salam\Kelas', 'kelas');
    }

}