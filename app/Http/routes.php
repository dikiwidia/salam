<?php

//PRELOAD
Route::get('/login','Auth\LoginController@index')->name('login.index');
Route::post('/login/auth','Auth\LoginController@auth')->name('login.auth');

Route::get('/phpinfo','Auth\LoginController@phpinfo');

Route::group(['middleware' => 'has_session'], function () {
    //DASBOR
    Route::get('/','Dasbor\DasborController@index')->name('dasbor.index');
    Route::get('/ajax/santri/by_jk','Dasbor\AjaxController@santri_by_jk')->name('ajax.santri-by-jk');
    Route::get('/ajax/santri/by_jk_year','Dasbor\AjaxController@santri_by_jk_year')->name('ajax.santri-by-jk-year');

    //SANTRI
    Route::get('/santri','Santri\SantriController@index')->name('santri.index')->middleware('mod_santri');
    Route::get('/santri/create','Santri\SantriController@create')->name('santri.create')->middleware('mod_santri');
    Route::get('/santri/edit/{id}','Santri\SantriController@edit')->name('santri.edit')->middleware('mod_santri');
    Route::get('/santri/show/{id}','Santri\SantriController@show')->name('santri.show')->middleware('mod_santri');
    Route::patch('/santri/update/{id}','Santri\SantriController@update')->name('santri.update')->middleware('mod_santri');
    Route::post('/santri/store','Santri\SantriController@store')->name('santri.store')->middleware('mod_santri');
    Route::get('/santri/delete/{id}','Santri\SantriController@destroy')->name('santri.delete')->middleware('mod_santri');

    //GURU
    Route::get('/pendidik','Guru\GuruController@index')->name('guru.index')->middleware('mod_pendidik');
    Route::get('/pendidik/create','Guru\GuruController@create')->name('guru.create')->middleware('mod_pendidik');
    Route::get('/pendidik/edit/{id}','Guru\GuruController@edit')->name('guru.edit')->middleware('mod_pendidik');
    Route::get('/pendidik/show/{id}','Guru\GuruController@show')->name('guru.show')->middleware('mod_pendidik');
    Route::patch('/pendidik/update/{id}','Guru\GuruController@update')->name('guru.update')->middleware('mod_pendidik');
    Route::post('/pendidik/store','Guru\GuruController@store')->name('guru.store')->middleware('mod_pendidik');
    Route::get('/pendidik/delete/{id}','Guru\GuruController@destroy')->name('guru.delete')->middleware('mod_pendidik');

    // KELOLA PENGGUNA
    Route::get('/pengguna','Pengguna\GuruController@index')->name('user.index')->middleware('mod_pendidik');
    Route::get('/pengguna/create','Pengguna\GuruController@create')->name('user.create')->middleware('mod_pendidik');
    Route::get('/pengguna/edit/{id}','Pengguna\GuruController@edit')->name('user.edit')->middleware('mod_pendidik');
    Route::patch('/pengguna/update/{id}','Pengguna\GuruController@update')->name('user.update')->middleware('mod_pendidik');
    Route::post('/pengguna/store','Pengguna\GuruController@store')->name('user.store')->middleware('mod_pendidik');
    Route::get('/pengguna/delete/{id}','Pengguna\GuruController@destroy')->name('user.delete')->middleware('mod_pendidik');
    Route::get('/pengguna/resetting/{id}','Pengguna\GuruController@reset')->name('user.reset')->middleware('mod_pendidik');

    //MATA PELAJARAN
    Route::get('/akademik','Akademik\MataPelajaranController@index')->name('akademik')->middleware('mod_akademik');
    Route::get('/akademik/mp','Akademik\MataPelajaranController@show')->name('akademik.mp')->middleware('mod_akademik');
    Route::get('/akademik/mp/create','Akademik\MataPelajaranController@create')->name('akademik.mp.create')->middleware('mod_akademik');
    Route::get('/akademik/mp/edit/{id}','Akademik\MataPelajaranController@edit')->name('akademik.mp.edit')->middleware('mod_akademik');
    Route::patch('/akademik/mp/update/{id}','Akademik\MataPelajaranController@update')->name('akademik.mp.update')->middleware('mod_akademik');
    Route::post('/akademik/mp/store','Akademik\MataPelajaranController@store')->name('akademik.mp.store')->middleware('mod_akademik');
    Route::get('/akademik/mp/delete/{id}','Akademik\MataPelajaranController@destroy')->name('akademik.mp.delete')->middleware('mod_akademik');

    //KELAS
    Route::get('/akademik/kl','Akademik\KelasController@index')->name('akademik.kl')->middleware('mod_akademik');
    Route::get('/akademik/kl/create','Akademik\KelasController@create')->name('akademik.kl.create')->middleware('mod_akademik');
    Route::get('/akademik/kl/edit/{id}','Akademik\KelasController@edit')->name('akademik.kl.edit')->middleware('mod_akademik');
    Route::patch('/akademik/kl/update/{id}','Akademik\KelasController@update')->name('akademik.kl.update')->middleware('mod_akademik');
    Route::post('/akademik/kl/store','Akademik\KelasController@store')->name('akademik.kl.store')->middleware('mod_akademik');
    Route::get('/akademik/kl/delete/{id}','Akademik\KelasController@destroy')->name('akademik.kl.delete')->middleware('mod_akademik');

    //REGISTRASI KELAS
    Route::get('/akademik/rs','Akademik\NaikKelasController@index')->name('akademik.rk')->middleware('mod_akademik');
    Route::get('/akademik/rs/{kelas}','Akademik\NaikKelasController@register')->name('akademik.rk.register')->middleware('mod_akademik');
    Route::get('/akademik/rs/{kelas}/list','Akademik\NaikKelasController@list_kelas')->name('akademik.rk.list')->middleware('mod_akademik');
    Route::post('/akademik/rs/{kelas}/store','Akademik\NaikKelasController@store')->name('akademik.rk.store')->middleware('mod_akademik');
    Route::get('/akademik/rs/{kelas}/delete/{id}','Akademik\NaikKelasController@destroy')->name('akademik.rk.delete')->middleware('mod_akademik');

    //REKAPITULASI KEHADIRAN
    Route::get('/akademik/rk','Akademik\RekapHadirController@index')->name('akademik.rp')->middleware('mod_akademik');
    Route::get('/akademik/rk/{kelas}','Akademik\RekapHadirController@kelas')->name('akademik.rp.class')->middleware('mod_akademik');
    Route::get('/akademik/rk/{kelas}/show/{jadwal}','Akademik\RekapHadirController@show')->name('akademik.rp.show')->middleware('mod_akademik');

    //REKAPITULASI MENGAJAR
    Route::get('/akademik/rm','Akademik\RekapAjarController@index')->name('akademik.rm')->middleware('mod_akademik');
    Route::get('/akademik/rm/{kelas}','Akademik\RekapAjarController@kelas')->name('akademik.rm.class')->middleware('mod_akademik');
    Route::get('/akademik/rm/{kelas}/show/{jadwal}','Akademik\RekapAjarController@show')->name('akademik.rm.show')->middleware('mod_akademik');
    Route::get('/akademik/rm/delete/{id}','Akademik\RekapAjarController@destroy')->name('akademik.rm.delete')->middleware('mod_akademik');

    //JADWAL
    Route::get('/akademik/jd','Akademik\JadwalController@index')->name('akademik.jd')->middleware('mod_akademik');
    Route::get('/akademik/jd/{kelas}','Akademik\JadwalController@kelas')->name('akademik.jd.kelas')->middleware('mod_akademik');
    Route::post('/akademik/jd/{kelas}/store','Akademik\JadwalController@store')->name('akademik.jd.store')->middleware('mod_akademik');
    Route::get('/akademik/jd/{kelas}/delete/{id}','Akademik\JadwalController@destroy')->name('akademik.jd.delete')->middleware('mod_akademik');
    Route::post('/akademik/jd/{kelas}/change','Akademik\JadwalController@change')->name('akademik.jd.change')->middleware('mod_akademik');

    //TAHUN AKADEMIK
    Route::get('/akademik/ta','Akademik\TAController@index')->name('akademik.ta')->middleware('mod_su');
    Route::get('/akademik/ta/create','Akademik\TAController@create')->name('akademik.ta.create')->middleware('mod_su');
    Route::patch('/akademik/ta/update','Akademik\TAController@update')->name('akademik.ta.update')->middleware('mod_su');
    Route::post('/akademik/ta/store','Akademik\TAController@store')->name('akademik.ta.store')->middleware('mod_su');
    Route::get('/akademik/ta/apply/{id}','Akademik\TAController@apply')->name('akademik.ta.apply')->middleware('mod_su');
    Route::get('/akademik/ta/delete/{id}','Akademik\TAController@destroy')->name('akademik.ta.delete')->middleware('mod_su');

    //PEKERJAAN
    Route::get('/pekerjaan','Pekerjaan\PekerjaanController@index')->name('jobs.index')->middleware('mod_su');
    Route::patch('/pekerjaan/update','Pekerjaan\PekerjaanController@update')->name('jobs.update')->middleware('mod_su');
    Route::post('/pekerjaan/store','Pekerjaan\PekerjaanController@store')->name('jobs.store')->middleware('mod_su');
    Route::get('/pekerjaan/delete/{id}','Pekerjaan\PekerjaanController@destroy')->name('jobs.delete')->middleware('mod_su');

    // KELOLA ADMIN
    Route::get('/admin','Pengguna\AdminController@index')->name('admin.index')->middleware('mod_su');
    Route::get('/admin/create','Pengguna\AdminController@create')->name('admin.create')->middleware('mod_su');
    Route::get('/admin/edit/{id}','Pengguna\AdminController@edit')->name('admin.edit')->middleware('mod_su');
    Route::patch('/admin/update/{id}','Pengguna\AdminController@update')->name('admin.update')->middleware('mod_su');
    Route::post('/admin/store','Pengguna\AdminController@store')->name('admin.store')->middleware('mod_su');
    Route::get('/admin/delete/{id}','Pengguna\AdminController@destroy')->name('admin.delete')->middleware('mod_su');
    Route::get('/admin/resetting/{id}','Pengguna\AdminController@reset')->name('admin.reset')->middleware('mod_su');
    
    // G
    Route::get('/mengajar','Kbm\KbmController@index')->name('mengajar.index')->middleware('guru');
    Route::get('/mengajar/{jadwal}','Kbm\KbmController@teaching')->name('mengajar.begin')->middleware('guru');
    Route::post('/mengajar/{jadwal}/store/{pertemuan}','Kbm\KbmController@store')->name('mengajar.store')->middleware('guru');
    Route::get('/mengajar/{jadwal}/finish/{pertemuan}','Kbm\KbmController@finish')->name('mengajar.finish')->middleware('guru');
    Route::patch('/mengajar/{jadwal}/update/{pertemuan}','Kbm\KbmController@update')->name('mengajar.update')->middleware('guru');
    Route::get('/absent/{jadwal}/chap/{pertemuan}','Kbm\KbmController@absent')->name('mengajar.absent')->middleware('guru');
    Route::post('/absent/{jadwal}/chap/{pertemuan}/store','Kbm\KbmController@absent_store')->name('mengajar.absent.store')->middleware('guru');

    Route::get('/rekapitulasi','Kbm\KbmController@rekap_index')->name('rekap.index')->middleware('guru');
    Route::get('/rekapitulasi/{jadwal}','Kbm\KbmController@rekap_absen')->name('rekap.absen')->middleware('guru');
    Route::get('/rekapitulasi/{jadwal}/show','Kbm\KbmController@rekap_show')->name('rekap.show')->middleware('guru');
    Route::get('/rekapitulasi/{jadwal}/chap/{pertemuan}','Kbm\KbmController@edit_absent')->name('rekap.edit')->middleware('guru');
    Route::patch('/rekapitulasi/{jadwal}/chap/{pertemuan}/update','Kbm\KbmController@absent_update')->name('mengajar.absent.update')->middleware('guru');

    Route::get('/pengaturan','Dasbor\PengaturanController@index')->name('setting.index');
    Route::patch('/pengaturan/saved','Dasbor\PengaturanController@update')->name('setting.update');
    Route::get('/logout','Auth\LoginController@logout')->name('login.exit');
});