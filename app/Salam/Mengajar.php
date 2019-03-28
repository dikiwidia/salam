<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model 
{

    protected $table = 'mengajar';
    public $timestamps = true;
    protected $fillable = array('materi', 'masuk_kelas', 'keluar_kelas', 'jadwal', 'pertemuan');

    public function getJadwal()
    {
        return $this->belongsTo('App\Salam\Jadwal', 'jadwal');
    }

    public function getPertemuan()
    {
        return $this->belongsTo('App\Salam\Pertemuan', 'pertemuan');
    }

}