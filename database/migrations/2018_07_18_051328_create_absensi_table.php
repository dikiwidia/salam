<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAbsensiTable extends Migration {

	public function up()
	{
		Schema::create('absensi', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('nama')->unsigned();
			$table->enum('absen', array('H', 'S', 'I', 'A'));
			$table->integer('jadwal')->unsigned();
			$table->integer('pertemuan')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('absensi');
	}
}