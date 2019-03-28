@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Kelas
    <small>Tambah</small>
    </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="box">
                    <form method="POST" action="{{route('akademik.kl.store')}}" autocomplete="off">
                    <div class="box-header with-border">
                        <a class="btn btn-danger" href="{{route('akademik.kl')}}">
                            <i class="fa fa-reply"></i> Kembali
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('kode_kelas') ? 'has-error' :'' }}">
                            <label class="control-label">Kode *</label>
                            <input name="kode_kelas" value="{{old('kode_kelas')}}" type="text" class="form-control" placeholder="Masukkan Kode Kelas" maxlength="10" required>
                            <span class="help-block">{{$errors->first('kode_kelas')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Kelas *</label>
                            <input name="nama" value="{{old('nama')}}" type="text" class="form-control" placeholder="Masukkan Nama Kelas" maxlength="50" required>
                            <span class="help-block">{{$errors->first('nama')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kapasitas') ? 'has-error' :'' }}">
                            <label class="control-label">Kapasitas *</label>
                            <input name="kapasitas" value="{{old('kapasitas')}}" type="text" class="form-control" placeholder="Masukkan Kapasitas Kelas" maxlength="2" required>
                            <span class="help-block">{{$errors->first('kapasitas')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('jenjang') ? 'has-error' :'' }}">
                            <label class="control-label">Jenjang *</label>
                            <select name="jenjang" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="SD" {{(old('jenjang') == 'SD') ? 'selected':''}}>SD</option>
                                <option value="SMP" {{(old('jenjang') == 'SMP') ? 'selected':''}}>SMP</option>
                                <option value="SMA" {{(old('jenjang') == 'SMP') ? 'selected':''}}>SMA</option>
                            </select>
                            <span class="help-block">{{$errors->first('jenjang')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('wali_kelas') ? 'has-error' :'' }}">
                            <label class="control-label">Wali Kelas *</label>
                            <select name="wali_kelas" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach($guru as $guru)
                                <option value="{{$guru->id}}" {{(old('wali_kelas') == $guru->id) ? 'selected':''}}>{{$guru->nama}}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{$errors->first('wali_kelas')}}</span>
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