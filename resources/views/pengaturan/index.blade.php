@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Pengaturan
    <small>Indeks</small>
    </h1>
    </section>

    <section class="content container-fluid">
        @if(session()->has('warning'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
            {!! session()->get('warning') !!}
        </div>   
        @endif
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="box">
                    <form method="POST" action="{{route('setting.update')}}" autocomplete="off">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{Session('nama')}}</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('password_old') ? 'has-error' :'' }}">
                            <label class="control-label">Kata Sandi Lama *</label>
                            <input name="password_old" type="password" class="form-control" placeholder="Kata Sandi Lama" required>
                            <span class="help-block">{{$errors->first('password_old')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                            <label class="control-label">Kata Sandi Baru *</label>
                            <input name="password" type="password" class="form-control" placeholder="Kata Sandi Baru (Min:8 Karakter)" required>
                            <span class="help-block">{{$errors->first('password')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' :'' }}">
                            <label class="control-label">Ketik Ulang Sandi *</label>
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Kata Sandi Baru" required>
                            <span class="help-block">{{$errors->first('password_confirmation')}}</span>
                        </div>
                    </div>
                    <div class="box-footer with-border">
                        <div class="btn-group pull-right">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="hidden" name="_method" value="PATCH" />
                            <a href="{{route('dasbor.index')}}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Perbaharui</button>
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