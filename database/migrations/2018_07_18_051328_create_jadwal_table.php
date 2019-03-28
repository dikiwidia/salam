<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJadwalTable extends Migration {

	public function up()
	{
		Schema::create('jadwal', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('jam_ke')->nullable();
			$table->integer('pelajaran')->unsigned();
			$table->integer('kelas')->unsigned();
			$table->integer('guru')->unsigned()->nullable();
			$table->integer('hari')->unsigned()->nullable();
			$table->time('mulai')->nullable();
			$table->time('selesai')->nullable();
			$table->integer('tahun_akademik')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('jadwal');
	}
}