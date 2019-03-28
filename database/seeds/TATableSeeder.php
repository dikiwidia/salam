<?php

use Illuminate\Database\Seeder;
use App\Salam\TahunAkademik;

class TATableSeeder extends Seeder {

	public function run()
	{
		TahunAkademik::create(
			[
				'nama' => '20181',
				'status' => 'A'
			]
		);
	}
}