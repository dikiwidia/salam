<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Salam\Pekerjaan;
use App\Salam\TahunAkademik;

class SantriUpdateRequest extends Request
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $jobs = new Pekerjaan;
        foreach($jobs->get() as $jobs){
            $arr[] = $jobs->id;
        }
        $r = implode(', ', $arr);

        $ta = new TahunAkademik;
        foreach($ta->get() as $ta){
            $arr[] = $ta->id;
        }
        $s = implode(', ', $arr);

        return [
            'nisn'              => 'required|numeric|unique:santri,nisn,'.$this->id, 
            'nama'              => 'required|string|max:100', 
            'tmp_lahir'         => 'required|string|max:20',
            'tgl_lahir'         => 'required|date', 
            'jenis_kelamin'     => 'required|in:L,P', 
            'alamat'            => 'string', 
            'kode_pos'          => 'numeric',  
            'tahun_akademik'    => 'required|in:'.$s, 
            'nama_ayah'         => 'required|string|max:100', 
            'pekerjaan_ayah_id' => 'required|in:'.$r, 
            'src_photo_ayah'    => 'sometimes|image|max:512|mimes:jpeg,jpg,png', 
            'nama_ibu'          => 'required|string|max:100', 
            'pekerjaan_ibu_id'  => 'required|in:'.$r, 
            'src_photo_ibu'     => 'sometimes|image|max:512|mimes:jpeg,jpg,png', 
            'telepon'           => 'string|max:20', 
            'hp'                => 'string|max:20',
            'jenjang'           => 'required|in:SD,SMP,SMA', 
            'src_photo'         => 'sometimes|image|max:512|mimes:jpeg,jpg,png',
            'status'            => 'required|in:A,P,M'
        ];
    }
}
