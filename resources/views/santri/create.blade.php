@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Santri
    <small>Tambah</small>
    </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="box">
                    <form method="POST" action="{{route('santri.store')}}" autocomplete="off" enctype="multipart/form-data" runat="server">
                    <div class="box-header with-border">
                        <a class="btn btn-danger" href="{{route('santri.index')}}">
                            <i class="fa fa-reply"></i> Kembali
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('nisn') ? 'has-error' :'' }}">
                            <label class="control-label">NISN *</label>
                            <input name="nisn" value="{{old('nisn')}}" type="text" class="form-control" placeholder="Masukkan NISN" maxlength="10" required>
                            <span class="help-block">{{$errors->first('nisn')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Santri *</label>
                            <input name="nama" value="{{old('nama')}}" type="text" class="form-control" placeholder="Masukkan Nama Santri" maxlength="100" required>
                            <span class="help-block">{{$errors->first('nama')}}</span>
                        </div>     
                        <div class="form-group {{ $errors->has('tmp_lahir') ? 'has-error' :'' }}">
                            <label class="control-label">Tempat Lahir *</label>
                            <input name="tmp_lahir" value="{{old('tmp_lahir')}}" type="text" class="form-control" placeholder="Masukkan Tempat Lahir" maxlength="20" required>
                            <span class="help-block">{{$errors->first('tmp_lahir')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tgl_lahir') ? 'has-error' :'' }}">
                            <label class="control-label">Tanggal Lahir *</label>
                            <input name="tgl_lahir" id="datepicker" value="{{old('tgl_lahir')}}" type="text" class="form-control" placeholder="Masukkan Tanggal Lahir" maxlength="10" required>
                            <span class="help-block">{{$errors->first('tgl_lahir')}}</span>
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
                        <div class="form-group {{ $errors->has('telepon') ? 'has-error' :'' }}">
                            <label class="control-label">Telepon</label>
                            <input name="telepon" value="{{old('telepon')}}" type="text" class="form-control" placeholder="Masukkan Nomor Telepon" maxlength="20">
                            <span class="help-block">{{$errors->first('telepon')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('hp') ? 'has-error' :'' }}">
                            <label class="control-label">Nomor HP</label>
                            <input name="hp" value="{{old('hp')}}" type="text" class="form-control" placeholder="Masukkan Nomor HP" maxlength="20">
                            <span class="help-block">{{$errors->first('hp')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('nama_ayah') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Ayah *</label>
                            <input name="nama_ayah" value="{{old('nama_ayah')}}" type="text" class="form-control" placeholder="Masukkan Nama Ayah" maxlength="100" required>
                            <span class="help-block">{{$errors->first('nama_ayah')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('pekerjaan_ayah_id') ? 'has-error' :'' }}">
                            <label class="control-label">Pekerjaan Ayah *</label>
                            <select name="pekerjaan_ayah_id" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach($jobs as $temp)
                                <option value="{{$temp->id}}" {{(old('pekerjaan_ayah_id') == $temp->id) ? 'selected':''}}>{{$temp->nama}}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{$errors->first('pekerjaan_ayah_id')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama_ibu') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Ibu *</label>
                            <input name="nama_ibu" value="{{old('nama_ibu')}}" type="text" class="form-control" placeholder="Masukkan Nama Ibu" maxlength="100" required>
                            <span class="help-block">{{$errors->first('nama_ibu')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('pekerjaan_ibu_id') ? 'has-error' :'' }}">
                            <label class="control-label">Pekerjaan Ibu *</label>
                            <select name="pekerjaan_ibu_id" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach($jobs as $temp)
                                <option value="{{$temp->id}}" {{(old('pekerjaan_ibu_id') == $temp->id) ? 'selected':''}}>{{$temp->nama}}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{$errors->first('pekerjaan_ibu_id')}}</span>
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
                        <div class="form-group {{ $errors->has('tahun_akademik') ? 'has-error' :'' }}">
                            <label class="control-label">Tahun Akademik *</label>
                            <select name="tahun_akademik" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach($ta as $temp)
                                <option value="{{$temp->id}}" {{(old('tahun_akademik') == $temp->id) ? 'selected':''}}>{{$temp->nama}}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{$errors->first('tahun_akademik')}}</span>
                        </div>                        
                        <div class="row">
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group {{ $errors->has('src_photo') ? 'has-error' :'' }}">
                                    <label class="control-label">Unggah Foto Santri</label>
                                    <input name="src_photo" type="file" accept="image/*" onchange="preSantri(event)">
                                    <span class="help-block">{{$errors->first('src_photo')}}</span>
                                </div>        
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group {{ $errors->has('src_photo_ayah') ? 'has-error' :'' }}">
                                    <label class="control-label">Unggah Foto Ayah</label>
                                    <input name="src_photo_ayah" type="file" accept="image/*" onchange="preAyah(event)">
                                    <span class="help-block">{{$errors->first('src_photo_ayah')}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group {{ $errors->has('src_photo_ibu') ? 'has-error' :'' }}">
                                    <label class="control-label">Unggah Foto Ibu</label>
                                    <input name="src_photo_ibu" type="file" accept="image/*" onchange="preIbu(event)">
                                    <span class="help-block">{{$errors->first('src_photo_ibu')}}</span>
                                </div>
                            </div>
                        </div>                                           
                        <div class="row">
                            <div class="col-lg-4 col-xs-12">
                                <img class="img-responsive pad" id="previewSantri" src="#" onerror="this.onerror=null;this.src='{{asset('files/default.png')}}';">        
                            </div>
                            <div class="col-lg-4 col-xs-12">                                
                                <img class="img-responsive pad" id="previewAyah" src="#" onerror="this.onerror=null;this.src='{{asset('files/default.png')}}';">
                            </div>
                            <div class="col-lg-4 col-xs-12">                                
                                <img class="img-responsive pad" id="previewIbu" src="#" onerror="this.onerror=null;this.src='{{asset('files/default.png')}}';">
                            </div>
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