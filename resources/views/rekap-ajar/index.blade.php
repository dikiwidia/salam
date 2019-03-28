@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Rekapitulasi Mengajar
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
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Berhasil !</h4>
            {!! session()->get('success') !!}
        </div>   
        @endif
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kelas yang Tersedia</h3>
                    </div>
                    
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Jenjang</th>
                                <th>Kapasitas</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data->count() == 0)
                                <tr>
                                    <td colspan="6">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($data as $temp)
                                <?php //dd($temp->getGuru()); ?>
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->kode_kelas}}</td>
                                    <td>{{$temp->nama}}</td>
                                    <td>{{$temp->jenjang}}</td>
                                    <td>{{$temp->kapasitas}}</td>
                                    <td>
                                        <div class="btn-group">
                                                <a href="{{route('akademik.rm.class', $temp->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-bar-chart"></i> Lihat</a>
                                        </div>       
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop