<?php

use Illuminate\Database\Seeder;
use App\Salam\Guru;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'niptk' => '11009229829200',
                'nama' => 'Moch Diki Widianto',
                'jenis_kelamin' => 'L',
                'status_perkawinan' => 'BM',
                'status' => 'A'
            ],
            [
                'niptk' => '11009229829400',
                'nama' => 'Abdul Hakim',
                'jenis_kelamin' => 'L',
                'status_perkawinan' => 'M',
                'status' => 'N'
            ],
            [
                'niptk' => '21009229829500',
                'nama' => 'Lida Maulida Nurahman',
                'jenis_kelamin' => 'P',
                'status_perkawinan' => 'BM',
                'status' => 'A'
            ]
        ];
        Guru::insert($data);
    }
}
