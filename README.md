# DEPRECATED
SALAM sudah tidak lagi dikembagkan & kemungkinan mendapat banyak bug dan tidak kompatibel untuk versi PHP > 7 .

# SALAM
SALAM atau Sistem Akademik La Tansa Mashiro adalah salah satu aplikasi yang digunakan untuk menunjang kegiatan belajar / mengajar. Terdapat fitur absensi santri dan guru di dalamnya. 

## Kebutuhan Sistem
Mengacu pada aturan dokumentasi [laravel-5.2]

## Instalasi
Langkah awal, _clonning_ dari repositori:
```sh
$ git clone https://github.com/dikiwidia/salam
```
Lanjutkan dengan menyalin file ```.env.example``` menjadi file baru ```.env``` kemudian ubah ```DB_DATABASE```, ```DB_USERNAME```, ```DB_PASSWORD``` sesuai dengan kebutuhan
```sh
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
Setelah itu simpan dan pastikan nama file hanya berupa ekstensi ```.env```. Lanjutkan dengan masuk kedalam folder **salam** dan mulai melakukan proses pembaharuan composer dengan cara:
```sh
$ composer update
```
Jangan lupa untuk melakukan _generate key_ setelah selesai proses pembaharuan composer selesai, perintahnya seperti berikut:
```sh
$ php artisan key:generate
$ composer dump-autoload
```
Lanjutkan dengan melakukan migrasi tabel kedalam basis data dengan cara:
```sh
$ php artisan migrate --seed
```

## Akses dengan HTTPS
Secara bawaan, aplikasi ini berjalan pada protokol HTTP, Untuk mengubah akses menjadi HTTPS, pertama-tama buka berkas ```app\Http\Kernel.php``` lalu hilangkan tanda komentar ```//``` pada ```\App\Http\Middleware\HttpsProtocol::class``` menjadi seperti dibawah ini.
```php
<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    //== ...

    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\HttpsProtocol::class,
        //\Illuminate\View\Middleware\ShareErrorsFromSession::class,
    ];

    //== ...
```
Untuk akses HTTP, Anda tidak perlu melakukan hal ini.

## Tampilan
![alt text](https://github.com/dikiwidia/salam/blob/master/screenshot.png)

## Lisensi
MIT

[laravel-5.2]: <https://laravel.com/docs/5.2/#server-requirements>
