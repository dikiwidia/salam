<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Eloquent::unguard();

		$this->call('HariTableSeeder');
    $this->command->info('Hari berhasil dimasukkan!!');
    $this->call('TATableSeeder');
		$this->command->info('Tahun Akademik berhasil dimasukkan!');
    $this->call('PekerjaanSeeder');
		$this->command->info('Pekerjaan berhasil dimasukkan!');
    $this->call('GuruSeeder');
		$this->command->info('Guru berhasil dimasukkan!');
    $this->call('PertemuanSeeder');
		$this->command->info('Pertemuan berhasil dimasukkan!');
    $this->call('SuperAdminSeeder');
		$this->command->info('Super Administrator berhasil dimasukkan!');
    }
}