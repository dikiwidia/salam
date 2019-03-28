<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistrasiKelasTable extends Migration {

	public function up()
	{
		Schema::create('registrasi_kelas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('nama')->unsigned();
			$table->integer('kelas')->unsigned()->nullable();
			$table->integer('tahun_akademik')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('registrasi_kelas');
	}
}