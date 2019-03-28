@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Mata Pelajaran
    <small>Tambah</small>
    </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="box">
                    <form method="POST" action="{{route('akademik.mp.store')}}" autocomplete="off">
                    <div class="box-header with-border">
                        <a class="btn btn-danger" href="{{route('akademik.mp')}}">
                            <i class="fa fa-reply"></i> Kembali
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('kode_mapel') ? 'has-error' :'' }}">
                            <label class="control-label">Kode *</label>
                            <input name="kode_mapel" value="{{old('kode_mapel')}}" type="text" class="form-control" placeholder="Masukkan Kode Mata Pelajaran" maxlength="10" required>
                            <span class="help-block">{{$errors->first('kode_mapel')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama_idn') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Pelajaran (Indonesia) *</label>
                            <input name="nama_idn" value="{{old('nama_idn')}}" type="text" class="form-control" placeholder="Masukkan Nama Pelajaran (Indonesia)" maxlength="50" required>
                            <span class="help-block">{{$errors->first('nama_idn')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama_eng') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Pelajaran (English)</label>
                            <input name="nama_eng" value="{{old('nama_eng')}}" type="text" class="form-control" placeholder="Masukkan Nama Pelajaran (English)" maxlength="50">
                            <span class="help-block">{{$errors->first('nama_eng')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('sks') ? 'has-error' :'' }}">
                            <label class="control-label">SKS</label>
                            <input name="sks" value="{{old('sks')}}" type="text" class="form-control" placeholder="Masukkan SKS" maxlength="1">
                            <span class="help-block">{{$errors->first('sks')}}</span>
                        </div>
                    </div>
                    <div class="box-footer with-border">
                        <div class="btn-group pull-right">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <button type="reset" class="btn btn-primary">Kosongkan</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-lg-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cek</h3>
                    </div>
                    <div class="box-body">
                        <div class="callout callout-danger">
                            <h4>I am a danger callout!</h4>
            
                            <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul,
                                like these sweet mornings of spring which I enjoy with my whole heart.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop