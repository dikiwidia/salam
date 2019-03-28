<aside class="main-sidebar">
    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('dist/img/user.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Session('nama')}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">DASBOR</li>
            <li><a href="{{route('dasbor.index')}}"><i class="fa fa-dashboard"></i> <span>Statistik dan Data</span></a></li>
            @if(session('role') == 'A')
            @if(session('mod_santri') == 'Y')
            <li class="header">SANTRI</li>
            <li><a href="{{route('santri.index')}}"><i class="fa fa-users"></i> <span>Data Santri</span></a></li>
            <li><a href="{{route('santri.create')}}"><i class="fa fa-user-plus"></i> <span>Buat Baru</span></a></li>
            @endif
            
            @if(session('mod_pendidik') == 'Y')
            <li class="header">PENDIDIK</li>
            <li><a href="{{route('guru.index')}}"><i class="fa fa-users"></i> <span>Data Pendidik</span></a></li>
            <li><a href="{{route('user.index')}}"><i class="fa fa-key"></i> <span>Kelola Pengguna</span></a></li>
            @endif

            @if(session('mod_akademik') == 'Y')
            <li class="header">AKADEMIK</li>
            <li><a href="{{route('akademik.mp')}}"><i class="fa fa-book"></i> <span>Mata Pelajaran</span></a></li>
            <li><a href="{{route('akademik.kl')}}"><i class="fa fa-institution"></i> <span>Kelas</span></a></li>
            <li><a href="{{route('akademik.rk')}}"><i class="fa fa-upload"></i> <span>Registrasi Santri</span></a></li>
            <li><a href="{{route('akademik.jd')}}"><i class="fa fa-calendar"></i> <span>Jadwal Pelajaran</span></a></li>
            <li><a href="{{route('akademik.rp')}}"><i class="fa fa-bar-chart"></i> <span>Rekapitulasi Kehadiran</span></a></li>
            <li><a href="{{route('akademik.rm')}}"><i class="fa fa-pie-chart"></i> <span>Rekapitulasi Mengajar</span></a></li>
            @endif

            @if(session('mod_su') == 'Y')
            <li class="header">KONFIGURASI</li>
            <li><a href="{{route('akademik.ta')}}"><i class="fa fa-graduation-cap"></i> <span>Tahun Akademik</span></a></li>
            <li><a href="{{route('jobs.index')}}"><i class="fa fa-cogs"></i> <span>Pekerjaan</span></a></li>
            <li><a href="{{route('admin.index')}}"><i class="fa fa-users"></i> <span>Kelola Administrator</span></a></li>
            @endif

            @else

            <li class="header">MENU UTAMA</li>
            <li><a href="{{route('mengajar.index')}}"><i class="fa fa-cube"></i> <span>Mulai Mengajar</span></a></li>
            <li><a href="{{route('rekap.index')}}"><i class="fa fa-bar-chart"></i> <span>Rekapitulasi Absen</span></a></li>
            <li><a href=""><i class="fa fa-calendar"></i> <span>Jadwal Mengajar</span></a></li>

            @endif
        </ul>
    </section>
</aside>