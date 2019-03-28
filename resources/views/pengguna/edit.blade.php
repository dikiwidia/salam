@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Kelola Pengguna
    <small>Sunting</small>
    </h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="box">
                    <form method="POST" action="{{route('user.update',$parse->id)}}" autocomplete="off">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pengguna : {{$parse->getGuru->nama}}</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label class="control-label">Status *</label>
                            <select name="status" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="A" {{($parse->status == 'A') ? 'selected':''}}>Aktif</option>
                                <option value="N" {{($parse->status == 'N') ? 'selected':''}}>Nonaktif</option>
                            </select>
                            <span class="help-block">{{$errors->first('status')}}</span>
                        </div>
                    </div>
                    <div class="box-footer with-border">
                        <div class="btn-group pull-right">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="hidden" name="_method" value="PATCH" />
                            <input type="hidden" name="id" value="{{$parse->id}}" />
                            <a href="{{route('user.index')}}" class="btn btn-danger">Batal</a>
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