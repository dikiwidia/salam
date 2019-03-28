@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Pendidik
    <small>Tambah</small>
    </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="box">
                    <form method="POST" action="{{route('guru.store')}}" autocomplete="off">
                    <div class="box-header with-border">
                        <a class="btn btn-danger" href="{{route('guru.index')}}">
                            <i class="fa fa-reply"></i> Kembali
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('niptk') ? 'has-error' :'' }}">
                            <label class="control-label">NIPTK</label>
                            <input name="niptk" value="{{old('niptk')}}" type="text" class="form-control" placeholder="Masukkan NIPTK" maxlength="20">
                            <span class="help-block">{{$errors->first('niptk')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Pendidik *</label>
                            <input name="nama" value="{{old('nama')}}" type="text" class="form-control" placeholder="Masukkan Nama Pendidik" maxlength="100" required>
                            <span class="help-block">{{$errors->first('nama')}}</span>
                        </div>                            
                        <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' :'' }}">
                            <label class="control-label">Jenis Kelamin *</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="" {{old('jenis_kelamin') == '' ? 'selected':''}}>-- Pilih --</option>
                                <option value="L" {{old('jenis_kelamin') == 'L' ? 'selected':''}}>Laki-laki</option>
                                <option value="P" {{old('jenis_kelamin') == 'P' ? 'selected':''}}>Perempuan</option>
                            </select>
                            <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status_perkawinan') ? 'has-error' :'' }}">
                            <label class="control-label">Status Perkawinan *</label>
                            <select name="status_perkawinan" class="form-control" required>
                                <option value="" {{old('status_perkawinan') == '' ? 'selected':''}}>-- Pilih --</option>
                                <option value="BM" {{old('status_perkawinan') == 'BM' ? 'selected':''}}>Lajang</option>
                                <option value="M" {{old('status_perkawinan') == 'M' ? 'selected':''}}>Menikah</option>
                                <option value="J" {{old('status_perkawinan') == 'J' ? 'selected':''}}>Janda</option>
                                <option value="D" {{old('status_perkawinan') == 'D' ? 'selected':''}}>Duda</option>
                            </select>
                            <span class="help-block">{{$errors->first('status_perkawinan')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('alamat') ? 'has-error' :'' }}">
                            <label class="control-label">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" style="resize:none" rows="3">{{old('alamat')}}</textarea>
                            <span class="help-block">{{$errors->first('alamat')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kode_pos') ? 'has-error' :'' }}">
                            <label class="control-label">Kode Pos</label>
                            <input name="kode_pos" value="{{old('kode_pos')}}" type="text" class="form-control" placeholder="Masukkan Kode Pos" maxlength="5">
                            <span class="help-block">{{$errors->first('kode_pos')}}</span>
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