<?php

use Illuminate\Database\Seeder;
use App\Salam\Hari;

class HariTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('hari')->delete();

		// HariSeeder
		Hari::create(
			[
				'kode_hari' => 'Sun',
				'nama_idn' => 'Minggu',
				'nama_eng' => 'Sunday'
			]
		);

		Hari::create(
			[
				'kode_hari' => 'Mon',
				'nama_idn' => 'Senin',
				'nama_eng' => 'Monday'
			]
		);
		
		Hari::create(
			[
				'kode_hari' => 'Tue',
				'nama_idn' => 'Selasa',
				'nama_eng' => 'Tuesday'
			]
		);
		
		Hari::create(
			[
				'kode_hari' => 'Wed',
				'nama_idn' => 'Rabu',
				'nama_eng' => 'Wednesday'
			]
		);

		Hari::create(
			[
				'kode_hari' => 'Thu',
				'nama_idn' => 'Kamis',
				'nama_eng' => 'Thursday'
			]
		);
		
		Hari::create(
			[
				'kode_hari' => 'Fri',
				'nama_idn' => 'Jumat',
				'nama_eng' => 'Friday'
			]
		);
		
		Hari::create(
			[
				'kode_hari' => 'Sat',
				'nama_idn' => 'Sabtu',
				'nama_eng' => 'Saturday'
			]
		);
	}
}