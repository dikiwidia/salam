<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHariTable extends Migration {

	public function up()
	{
		Schema::create('hari', function(Blueprint $table) {
			$table->increments('id');
			$table->string('kode_hari', 3);
			$table->string('nama_idn', 10);
			$table->string('nama_eng', 10);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('hari');
	}
}