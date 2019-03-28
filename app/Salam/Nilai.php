<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model 
{

    protected $table = 'nilai';
    public $timestamps = true;
    protected $fillable = array('nama', 'mapel', 'nilai', 'guru', 'tahun_akademik');

    public function getRegistrasiKelas()
    {
        return $this->belongsTo('App\Salam\RegistrasiKelas', 'nama');
    }

    public function getKelas()
    {
        return $this->belongsTo('App\Salam\Kelas', 'kelas');
    }

    public function getMapel()
    {
        return $this->belongsTo('App\Salam\Mapel', 'mapel');
    }

    public function getGuru()
    {
        return $this->belongsTo('App\Salam\Guru', 'guru');
    }

    public function getTahunAkademik()
    {
        return $this->belongsTo('App\Salam\TahunAkademik', 'tahun_akademik');
    }

}