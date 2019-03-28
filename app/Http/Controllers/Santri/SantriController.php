<?php

namespace App\Http\Controllers\Santri;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\SantriStoreRequest;
use App\Http\Requests\SantriUpdateRequest;

use App\Salam\Santri;
use App\Salam\Pekerjaan;
use App\Salam\TahunAkademik;

class SantriController extends Controller
{
    private $modulURL;
    private $ta;

    public function __construct()
    {
        $this->modulURL = route('santri.index');
        $this->ta = TahunAkademik::where('status','A')->get();
    }

    public function index()
    {
        $no     = 1;
        $data   = Santri::get();
        return view('santri.index',compact('data','no'));
    }

    public function create()
    {
        $jobs   = Pekerjaan::get();
        $ta     = TahunAkademik::get();
        if($jobs->count() == 0){
            return redirect($this->modulURL)->with('warning', 'Maaf ! Tidak ada "Daftar Pekerjaan" yang dimasukkan ke dalam sistem, hubungi Administrator untuk menyelesaikan permasalahan ini.');
        }
        if($this->ta->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Kesalahan ! Hubungi Administrator terkait Tahun Akademik');
        }
        return view('santri.create',compact('jobs','ta'));
    }

    public function store(SantriStoreRequest $r)
    {
        $uploadPath  = 'files';
        $rand        = rand(000,999);

        if($r->hasFile('src_photo')){
            $file   = $r->file('src_photo');
            $ext    = $file->getClientOriginalExtension();
            
            $foto_santri = 'santri_'.$rand.'_'.date('YmdHis').'.'.$ext;

            //moving
            $file->move($uploadPath,$foto_santri);
            
        } else {
            $foto_santri = NULL;
        }

        if($r->hasFile('src_photo_ayah')){
            $file   = $r->file('src_photo_ayah');
            $ext    = $file->getClientOriginalExtension();

            $foto_ayah = 'ayah_'.$rand.'_'.date('YmdHis').'.'.$ext;

            //moving
            $file->move($uploadPath,$foto_ayah);
        } else {
            $foto_ayah = NULL;
        }

        if($r->hasFile('src_photo_ibu')){
            $file   = $r->file('src_photo_ibu');
            $ext    = $file->getClientOriginalExtension();

            $foto_ibu = 'ibu_'.$rand.'_'.date('YmdHis').'.'.$ext;

            //moving
            $file->move($uploadPath,$foto_ibu);
        } else {
            $foto_ibu = NULL;
        }

        Santri::create([
            'nisn'              => $r->nisn, 
            'nama'              => $r->nama, 
            'tmp_lahir'         => $r->tmp_lahir, 
            'tgl_lahir'         => $r->tgl_lahir, 
            'jenis_kelamin'     => $r->jenis_kelamin,
            'alamat'            => $r->alamat,
            'kode_pos'          => $r->kode_pos,
            'tahun_akademik'    => $r->tahun_akademik,
            'nama_ayah'         => $r->nama_ayah,
            'pekerjaan_ayah_id' => $r->pekerjaan_ayah_id,
            'src_photo_ayah'    => $foto_ayah,
            'nama_ibu'          => $r->nama_ibu, 
            'pekerjaan_ibu_id'  => $r->pekerjaan_ibu_id,
            'src_photo_ibu'     => $foto_ibu,
            'telepon'           => $r->telepon,
            'hp'                => $r->hp,
            'jenjang'           => $r->jenjang,
            'src_photo'         => $foto_santri,
            'status'            => 'A'
        ]);
        return redirect($this->modulURL)->with('success','Berhasil menambahkan Santri');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $jobs   = Pekerjaan::get();
        $ta     = TahunAkademik::get();
        if($jobs->count() == 0){
            return redirect($this->modulURL)->with('warning', 'Maaf ! Tidak ada "Daftar Pekerjaan" yang dimasukkan ke dalam sistem, hubungi Administrator untuk menyelesaikan permasalahan ini.');
        }
        if($this->ta->count() != 1){
            return redirect($this->modulURL)->with('warning', 'Kesalahan ! Hubungi Administrator terkait Tahun Akademik');
        }
        $parse   = Santri::where('id',$id);
        if($parse->count() == 0){
            return redirect($this->modulURL);
        }
        $parse = $parse->first();
        return view('santri.edit',compact('parse','jobs','ta'));
    }

    public function update(SantriUpdateRequest $r, $id)
    {
        $uploadPath  = 'files';
        $rand        = rand(000,999);
        $old         = Santri::findOrFail($id);

        if($r->hasFile('src_photo')){
            $file   = $r->file('src_photo');
            $ext    = $file->getClientOriginalExtension();
            
            $foto_santri = 'santri_'.$rand.'_'.date('YmdHis').'.'.$ext;
            Storage::disk('foto')->delete($old->src_photo);
            //moving
            $file->move($uploadPath,$foto_santri);
            
        } else {
            $foto_santri = $old->src_photo;
        }

        if($r->hasFile('src_photo_ayah')){
            $file   = $r->file('src_photo_ayah');
            $ext    = $file->getClientOriginalExtension();

            $foto_ayah = 'ayah_'.$rand.'_'.date('YmdHis').'.'.$ext;
            Storage::disk('foto')->delete($old->src_photo_ayah);
            //moving
            $file->move($uploadPath,$foto_ayah);
        } else {
            $foto_ayah = $old->src_photo_ayah;
        }

        if($r->hasFile('src_photo_ibu')){
            $file   = $r->file('src_photo_ibu');
            $ext    = $file->getClientOriginalExtension();

            $foto_ibu = 'ibu_'.$rand.'_'.date('YmdHis').'.'.$ext;
            Storage::disk('foto')->delete($old->src_photo_ibu);
            //moving
            $file->move($uploadPath,$foto_ibu);
        } else {
            $foto_ibu = $old->src_photo_ibu;
        }

        $list = [
            'nisn'              => $r->nisn, 
            'nama'              => $r->nama, 
            'tmp_lahir'         => $r->tmp_lahir, 
            'tgl_lahir'         => $r->tgl_lahir, 
            'jenis_kelamin'     => $r->jenis_kelamin,
            'alamat'            => $r->alamat,
            'kode_pos'          => $r->kode_pos,
            'tahun_akademik'    => $r->tahun_akademik,
            'nama_ayah'         => $r->nama_ayah,
            'pekerjaan_ayah_id' => $r->pekerjaan_ayah_id,
            'src_photo_ayah'    => $foto_ayah,
            'nama_ibu'          => $r->nama_ibu, 
            'pekerjaan_ibu_id'  => $r->pekerjaan_ibu_id,
            'src_photo_ibu'     => $foto_ibu,
            'telepon'           => $r->telepon,
            'hp'                => $r->hp,
            'jenjang'           => $r->jenjang,
            'src_photo'         => $foto_santri,
            'status'            => $r->status
        ];

        $old->update($list);
        return redirect($this->modulURL)->with('success','Berhasil mengubah biodata santri');;
    }

    public function destroy($id)
    {
        $patch = Santri::findOrFail($id);

        if($patch->src_photo != NULL){
            Storage::disk('foto')->delete($patch->src_photo);
        }
        if($patch->src_photo_ayah != NULL){
            Storage::disk('foto')->delete($patch->src_photo_ayah);
        }
        if($patch->src_photo_ibu != NULL){
            Storage::disk('foto')->delete($patch->src_photo_ibu);
        }
        $patch->delete();
        
        return redirect($this->modulURL)->with('success','Berhasil menghapus Santri');;
    }
}
