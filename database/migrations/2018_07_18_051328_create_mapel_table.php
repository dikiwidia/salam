<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMapelTable extends Migration {

	public function up()
	{
		Schema::create('mapel', function(Blueprint $table) {
			$table->increments('id');
			$table->string('kode_mapel', 10)->nullable();
			$table->string('nama_idn', 50)->nullable();
			$table->string('nama_eng', 50)->nullable();
			$table->integer('sks')->nullable();
			$table->enum('status', array('A', 'N'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('mapel');
	}
}