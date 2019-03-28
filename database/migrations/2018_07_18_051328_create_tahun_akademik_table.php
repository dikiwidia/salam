<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTahunAkademikTable extends Migration {

	public function up()
	{
		Schema::create('tahun_akademik', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama', 50)->nullable();
			$table->enum('status', array('A', 'N'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('tahun_akademik');
	}
}