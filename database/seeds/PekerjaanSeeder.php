<?php

use Illuminate\Database\Seeder;
use App\Salam\Pekerjaan;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Wiraswasta'],
			['nama' => 'Buruh'],
			['nama' => 'PNS'],
			['nama' => 'Polisi'],
			['nama' => 'Pengacara'],
			['nama' => 'Dokter'],
			['nama' => 'Perawat'],
			['nama' => 'Lainnya']
        ];
        Pekerjaan::insert($data);
    }
}
