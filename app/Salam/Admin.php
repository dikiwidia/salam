<?php

namespace App\Salam;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model 
{

    protected $table = 'admin';
    public $timestamps = true;
    protected $fillable = array('nickname', 'passcode', 'nama', 'status', 'mod_santri', 'mod_pendidik', 'mod_akademik','mod_su');

}