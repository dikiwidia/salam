@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Rekapitulasi Absen 
    <small>{{$data['mapel']}} - {{$data['kelas']}}</small>
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
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <a href="{{route('rekap.index')}}" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                
                                @foreach($data['pertemuan'] as $tmp)
                                <th>{{$tmp->nama}}</th>
                                @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['absensi'] as $abs)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$abs['nisn']}}</td>
                                    <td>{{$abs['nama']}}</td>
                                    @foreach($data['pertemuan'] as $tmp)
                                    <?php
                                    if($abs['status'][$tmp->id]['absen'] == "NR"){
                                        $color = '';
                                    }elseif($abs['status'][$tmp->id]['absen'] == "S"){
                                        $color = 'info';
                                    }elseif($abs['status'][$tmp->id]['absen'] == "H"){
                                        $color = 'success';
                                    }elseif($abs['status'][$tmp->id]['absen'] == "I"){
                                        $color = 'info';
                                    }elseif($abs['status'][$tmp->id]['absen'] == "A"){
                                        $color = 'danger';
                                    }
                                    ?>
                                    <td class="{{$color}}">
                                        @if($abs['status'][$tmp->id]['absen'] == 'H')
                                        <i class="fa fa-check"></i>
                                        @endif
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="success" width="35"><i class="fa fa-check"></i></td>
                                    <td>Hadir</td>
                                </tr>
                                <tr>
                                    <td class="info"></td>
                                    <td>Sakit</td>
                                </tr>
                                <tr>
                                    <td class="warning"></td>
                                    <td>Izin</td>
                                </tr>
                                <tr>
                                    <td class="danger"></td>
                                    <td>Alpa</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Absensi Kosong</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
