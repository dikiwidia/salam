<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model 
{

    protected $table = 'santri';
    public $timestamps = true;
    protected $fillable = array('nisn', 'nama', 'tmp_lahir', 'tgl_lahir', 'jenis_kelamin', 'agama', 'jenjang', 'alamat', 'kode_pos', 'nama_ayah', 'pekerjaan_ayah_id', 'src_photo_ayah', 'nama_ibu', 'pekerjaan_ibu_id', 'src_photo_ibu', 'telepon', 'hp', 'src_photo', 'status', 'tahun_akademik');

    public function getPekerjaanAyah()
    {
        return $this->belongsTo('App\Salam\Pekerjaan', 'pekerjaan_ayah_id');
    }

    public function getPekerjaanIbu()
    {
        return $this->belongsTo('App\Salam\Pekerjaan', 'pekerjaan_ibu_id');
    }

    public function getTahunAkademik()
    {
        return $this->belongsTo('App\Salam\TahunAkademik', 'tahun_akademik');
    }

}