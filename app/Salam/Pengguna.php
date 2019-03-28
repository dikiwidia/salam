<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model 
{

    protected $table = 'pengguna';
    public $timestamps = true;
    protected $fillable = array('nickname', 'passcode', 'guru', 'status');
    protected $hidden = array('passcode');

    public function getGuru()
    {
        return $this->belongsTo('App\Salam\Guru', 'guru');
    }

}