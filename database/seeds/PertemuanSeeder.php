<?php

use Illuminate\Database\Seeder;
use App\Salam\Pertemuan;

class PertemuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => '01'],
			['nama' => '02'],
			['nama' => '03'],
			['nama' => '04'],
			['nama' => '05'],
			['nama' => '06'],
			['nama' => '07'],
			['nama' => '08'],
			['nama' => '09'],
			['nama' => '10'],
			['nama' => '11'],
			['nama' => '12'],
			['nama' => '13'],
			['nama' => '14'],
			['nama' => '15'],
			['nama' => '16'],
			['nama' => '17'],
			['nama' => '18'],
			['nama' => '19'],
            ['nama' => '20'],
            ['nama' => '21'],
			['nama' => '22'],
			['nama' => '23'],
			['nama' => '24'],
			['nama' => '25'],
        ];
        Pertemuan::insert($data);
    }
}
