<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model 
{

    protected $table = 'jadwal';
    public $timestamps = true;
    protected $fillable = array('jam_ke', 'pelajaran', 'kelas', 'guru', 'hari', 'mulai', 'selesai', 'tahun_akademik');

    public function getKelas()
    {
        return $this->belongsTo('App\Salam\Kelas', 'kelas');
    }

    public function getMapel()
    {
        return $this->belongsTo('App\Salam\Mapel', 'pelajaran');
    }

    public function getGuru()
    {
        return $this->belongsTo('App\Salam\Guru', 'guru');
    }

    public function getHari()
    {
        return $this->belongsTo('App\Salam\Hari', 'hari');
    }

    public function getTahunAkademik()
    {
        return $this->belongsTo('App\Salam\TahunAkademik', 'tahun_akademik');
    }

}