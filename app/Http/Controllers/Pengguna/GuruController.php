<?php

namespace App\Http\Controllers\Pengguna;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PenggunaStoreRequest;
use App\Http\Requests\PenggunaUpdateRequest;
use Session;

use App\Salam\Pengguna;
use App\Salam\Guru;

class GuruController extends Controller
{
    private $modulURL;

    public function __construct()
    {
        $this->modulURL = route('user.index');
    }

    public function index()
    {
        $no     = 1;
        $data   = Pengguna::get();
        return view('pengguna.index',compact('data','no'));
    }

    public function create()
    {
        $cePeng = Pengguna::get();
        if($cePeng->count() == 0){ 
            $ceGuru = Guru::where('status','A')->get();
        } else { 
            foreach($cePeng as $t){
                $arr[] = $t->guru;
            }
            $ceGuru = Guru::whereNotIn('id',$arr)->where('status','A')->get();
        }
        if($ceGuru->count() == 0){
            return redirect($this->modulURL)->with('warning','Tidak ada Data Pendidik aktif yang tersedia');
        }
        $data['guru'] = $ceGuru;
        return view('pengguna.create',compact('data'));
    }

    public function store(PenggunaStoreRequest $request)
    {
        Pengguna::create([
            'nickname'      => $request->nickname,
            'passcode'      => bcrypt('12345678'),
            'guru'          => $request->guru,
            'status'        => 'A'
        ]);
        return redirect($this->modulURL)->with('success','Berhasil menambahkan '.$request->nickname);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $parse   = Pengguna::where('id',$id);
        if($parse->count() == 0){
            return redirect($this->modulURL);
        }
        $parse = $parse->first();
        return view('pengguna.edit',compact('parse'));
    }

    public function update(PenggunaUpdateRequest $request, $id)
    {
        $list = [
            'status'        => $request->status,
        ];
        $patch = Pengguna::where('id',$id);
        if($patch->count() == 0){            
            return redirect($this->modulURL);
        }
        $patch->update($list);
        return redirect($this->modulURL)->with('success','Berhasil mengubah');
    }

    public function reset($id)
    {
        $list = [
            'passcode'        => bcrypt('12345678'),
        ];
        $patch = Pengguna::where('id',$id);
        if($patch->count() == 0){
            return redirect(route('user.index'))->with('warning', 'Data Tidak Tersedia');
        }
        $patch->update($list);
        return redirect(route('user.index'))->with('success', 'Kata Sandi berhasil dikembalikan ke awal');
    }

    public function destroy($id)
    {
        $patch = Pengguna::where('id',$id);
        if($patch->count() == 0){
            return redirect(route('user.index'))->with('warning', 'Data Tidak Tersedia');
        }
        $patch->delete();
        return redirect(route('user.index'))->with('success', 'Data Dihapus');
    }
}
