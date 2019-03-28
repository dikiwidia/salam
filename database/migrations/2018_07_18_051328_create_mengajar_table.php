<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMengajarTable extends Migration {

	public function up()
	{
		Schema::create('mengajar', function(Blueprint $table) {
			$table->increments('id');
			$table->string('materi', 100)->nullable();
			$table->datetime('masuk_kelas')->nullable();
			$table->datetime('keluar_kelas')->nullable();
			$table->integer('jadwal')->unsigned();
			$table->integer('pertemuan')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('mengajar');
	}
}