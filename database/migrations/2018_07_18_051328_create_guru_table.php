<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGuruTable extends Migration {

	public function up()
	{
		Schema::create('guru', function(Blueprint $table) {
			$table->increments('id');
			$table->string('niptk', 20)->nullable();
			$table->string('kode_guru', 10)->nullable();
			$table->string('nama', 100)->nullable();
			$table->enum('jenis_kelamin', array('L', 'P'));
			$table->text('alamat')->nullable();
			$table->integer('kode_pos')->nullable();
			$table->enum('status_perkawinan', array('M', 'BM', 'J', 'D'));
			$table->enum('status', array('A', 'N', 'K', 'M'));
			$table->string('src_photo')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('guru');
	}
}