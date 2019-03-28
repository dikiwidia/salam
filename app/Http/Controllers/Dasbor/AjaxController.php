<?php

namespace App\Http\Controllers\Dasbor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use App\Salam\Santri;
use App\Salam\Guru;
use App\Salam\Mapel;
use App\Salam\Kelas;
use App\Salam\TahunAkademik;

class AjaxController extends Controller
{
    public function santri_by_jk()
    {
        $data[0]['label'] = 'SD'; 
        $data[0]['value'] = Santri::where('jenjang','SD')->get()->count();
        $data[1]['label'] = 'SMP'; 
        $data[1]['value'] = Santri::where('jenjang','SMP')->get()->count();
        $data[2]['label'] = 'SMA'; 
        $data[2]['value'] = Santri::where('jenjang','SMA')->get()->count();

        return json_encode($data);
    }
    public function santri_by_jk_year()
    {
        $p = TahunAkademik::get();
        foreach($p as $ta){  
            $data[] = [
                'y' => $ta->nama,
                'item1' => Santri::where('jenis_kelamin','L')->where('tahun_akademik',$ta->id)->count(),
                'item2' => Santri::where('jenis_kelamin','P')->where('tahun_akademik',$ta->id)->count()
            ];
        }
        $parse = $data;
        return json_encode($parse);
    }
}
