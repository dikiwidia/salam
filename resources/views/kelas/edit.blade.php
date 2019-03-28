@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Kelas
    <small>Sunting</small>
    </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="box">
                    <form method="POST" action="{{route('akademik.kl.update',$parse->id)}}" autocomplete="off">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Kelas : {{$parse->kode_kelas}} - {{$parse->nama}}</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label">Kode *</label>
                            <input value="{{$parse->kode_kelas}}" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Kelas *</label>
                            <input name="nama" value="{{$parse->nama}}" type="text" class="form-control" placeholder="Masukkan Nama Kelas" maxlength="50" required>
                            <span class="help-block">{{$errors->first('nama')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kapasitas') ? 'has-error' :'' }}">
                            <label class="control-label">Kapasitas *</label>
                            <input name="kapasitas" value="{{$parse->kapasitas}}" type="text" class="form-control" placeholder="Masukkan Kapasitas Kelas" maxlength="2" required>
                            <span class="help-block">{{$errors->first('kapasitas')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jenjang') ? 'has-error' :'' }}">
                            <label class="control-label">Jenjang *</label>
                            <select name="jenjang" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="SD" {{($parse->jenjang == 'SD') ? 'selected':''}}>SD</option>
                                <option value="SMP" {{($parse->jenjang == 'SMP') ? 'selected':''}}>SMP</option>
                                <option value="SMA" {{($parse->jenjang == 'SMA') ? 'selected':''}}>SMA</option>
                            </select>
                            <span class="help-block">{{$errors->first('jenjang')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('wali_kelas') ? 'has-error' :'' }}">
                            <label class="control-label">Wali Kelas *</label>
                            <select name="wali_kelas" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach($guru as $guru)
                                <option value="{{$guru->id}}" {{($parse->wali_kelas == $guru->id) ? 'selected':''}}>{{$guru->nama}}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{$errors->first('wali_kelas')}}</span>
                        </div>
                    </div>
                    <div class="box-footer with-border">
                        <div class="btn-group pull-right">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="hidden" name="_method" value="PATCH" />
                            <input type="hidden" name="id" value="{{$parse->id}}" />
                            <a href="{{route('akademik.mp')}}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Perbaharui</button>
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