@extends('template')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Dasbor
    <small>Statistik dan Data</small>
    </h1>
    </section>

    <!-- Main content -->
    <section class="content">
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$data['santri']->count()}}</h3>
                        <p>Santri Aktif Terdaftar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="{{route('santri.index')}}" class="small-box-footer">Lihat lengkap <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$data['guru']->count()}}</h3>
                        <p>Pendidik Aktif Terdaftar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="{{route('guru.index')}}" class="small-box-footer">Lihat lengkap <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$data['mp']->count()}}</h3>
                        <p>Mata Pelajaran Tersedia</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-book"></i>
                    </div>
                    <a href="{{route('akademik.mp')}}" class="small-box-footer">Lihat lengkap <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$data['kl']->count()}}</h3>
                        <p>Ruang Kelas Tersedia</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-home"></i>
                    </div>
                    <a href="{{route('akademik.kl')}}" class="small-box-footer">Lihat lengkap <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        @if(Session('role') == 'A')
        <div class="row">
            <section class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Jadwal Mengajar Hari Ini : {{$data['dNow']}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Mata Pelajaran</th>
                                <th>Pert.</th>
                                <th>Pengajar</th>
                                <th>Kelas</th>
                                <th>Jenjang</th>
                                <th>SKS</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['mengajar']->count() == 0)
                            <tr>
                                <td colspan="10">Tidak Ada Kegiatan Mengajar Hari ini</td>
                            </tr>
                            @else
                            @foreach($data['mengajar'] as $temp)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$temp->getJadwal->getMapel->kode_mapel}}</td>
                                <td>{{$temp->getJadwal->getMapel->nama_idn}}</td>
                                <td>{{$temp->getPertemuan->nama}}</td>
                                <td>{{$temp->getJadwal->guru == NULL ? '-': $temp->getJadwal->getGuru->nama}}</td>
                                <td>{{$temp->getJadwal->getKelas->nama}}</td>
                                <td>{{$temp->getJadwal->getKelas->jenjang}}</td>
                                <td>{{$temp->getJadwal->getMapel->sks}}</td>
                                <td>{{\Carbon\Carbon::parse($temp->masuk_kelas)->format('H:i')}}</td>
                                <td>@if($temp->keluar_kelas == NULL) <span class="label label-primary">Sedang Mengajar ...</span> @else {{\Carbon\Carbon::parse($temp->keluar_kelas)->format('H:i')}} @endif</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            <!-- /.box-footer -->
            </div>
            </section>
        </div>
        @endif
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-xs-12 col-lg-6 connectedSortable">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Statistik Santri Berdasarkan Jenis Kelamin</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="santri-jk-chart" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <section class="col-xs-12 col-lg-6 connectedSortable">
                <!-- DONUT CHART -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Statistik Santri Berdasarkan Jenjang</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="santri-st-chart" style="height: 300px; position: relative;"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
        </div>
    </section>
</div>
@stop