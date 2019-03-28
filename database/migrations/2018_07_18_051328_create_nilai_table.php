<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNilaiTable extends Migration {

	public function up()
	{
		Schema::create('nilai', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('nama')->unsigned();
			$table->integer('mapel')->unsigned();
			$table->integer('nilai')->default('0');
			$table->integer('guru')->unsigned();
			$table->integer('tahun_akademik')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('nilai');
	}
}