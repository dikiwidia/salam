@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Kelola Administrator
    <small>Tambah</small>
    </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="box">
                    <form method="POST" action="{{route('admin.store')}}" autocomplete="off">
                    <div class="box-header with-border">
                        <a class="btn btn-danger" href="{{route('admin.index')}}">
                            <i class="fa fa-reply"></i> Kembali
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' :'' }}">
                            <label class="control-label">Nama *</label>
                            <input name="nama" value="{{old('nama')}}" type="text" class="form-control" placeholder="Nama Lengkap" maxlength="100" required>
                            <span class="help-block">{{$errors->first('nama')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nickname') ? 'has-error' :'' }}">
                            <label class="control-label">Nickname *</label>
                            <input name="nickname" value="{{old('nickname')}}" type="text" class="form-control" placeholder="Masukkan Nickname (Tanpa Spasi)" maxlength="6" required>
                            <span class="help-block">{{$errors->first('nickname')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('mod_santri') ? 'has-error' :'' }}">
                            <label class="control-label">Akses Modul Santri *</label>
                            <select name="mod_santri" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Y" {{(old('mod_santri') == 'Y') ? 'selected':''}}>Aktif</option>
                                <option value="N" {{(old('mod_santri') == 'N') ? 'selected':''}}>Nonaktif</option>
                            </select>
                            <span class="help-block">{{$errors->first('mod_santri')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('mod_akademik') ? 'has-error' :'' }}">
                            <label class="control-label">Akses Modul Akademik *</label>
                            <select name="mod_akademik" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Y" {{(old('mod_akademik') == 'Y') ? 'selected':''}}>Aktif</option>
                                <option value="N" {{(old('mod_akademik') == 'N') ? 'selected':''}}>Nonaktif</option>
                            </select>
                            <span class="help-block">{{$errors->first('mod_akademik')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('mod_pendidik') ? 'has-error' :'' }}">
                            <label class="control-label">Akses Modul Pendidik *</label>
                            <select name="mod_pendidik" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Y" {{(old('mod_pendidik') == 'Y') ? 'selected':''}}>Aktif</option>
                                <option value="N" {{(old('mod_pendidik') == 'N') ? 'selected':''}}>Nonaktif</option>
                            </select>
                            <span class="help-block">{{$errors->first('mod_pendidik')}}</span>
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
                        <h3 class="box-title">Petunjuk Pengisian</h3>
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