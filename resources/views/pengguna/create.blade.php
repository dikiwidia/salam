@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Kelola Pengguna
    <small>Tambah</small>
    </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="box">
                    <form method="POST" action="{{route('user.store')}}" autocomplete="off">
                    <div class="box-header with-border">
                        <a class="btn btn-danger" href="{{route('user.index')}}">
                            <i class="fa fa-reply"></i> Kembali
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('nickname') ? 'has-error' :'' }}">
                            <label class="control-label">Nickname *</label>
                            <input name="nickname" value="{{old('nickname')}}" type="text" class="form-control" placeholder="Masukkan Nickname (Tanpa Spasi)" maxlength="6" required>
                            <span class="help-block">{{$errors->first('nickname')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('guru') ? 'has-error' :'' }}">
                            <label class="control-label">Pilih Pendidik *</label>
                            <select name="guru" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @if($data['guru']->count() == 0)
                                @else
                                @foreach($data['guru'] as $temp)
                                <option value="{{$temp->id}}" {{(old('guru') == $temp->id) ? 'selected':''}}>{{$temp->nama}}</option>
                                @endforeach
                                @endif
                            </select>
                            <span class="help-block">{{$errors->first('mod_santri')}}</span>
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