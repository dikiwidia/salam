<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model 
{

    protected $table = 'absensi';
    public $timestamps = true;
    protected $fillable = array('nama', 'absen', 'jadwal', 'pertemuan');

    public function getRegistrasiKelas()
    {
        return $this->belongsTo('App\Salam\RegistrasiKelas', 'nama');
    }

    public function getPertemuan()
    {
        return $this->belongsTo('App\Salam\Pertemuan', 'pertemuan');
    }

    public function getJadwal()
    {
        return $this->belongsTo('App\Salam\Jadwal', 'jadwal');
    }

}