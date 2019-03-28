<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSantriTable extends Migration {

	public function up()
	{
		Schema::create('santri', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nisn', 10)->nullable();
			$table->string('nama', 100)->nullable();
			$table->string('tmp_lahir', 20)->nullable();
			$table->date('tgl_lahir')->nullable();
			$table->enum('jenis_kelamin', array('L', 'P'));
			$table->integer('agama')->nullable();
			$table->enum('jenjang', array('SD', 'SMP', 'SMA'));
			$table->text('alamat')->nullable();
			$table->integer('kode_pos')->nullable();
			$table->string('nama_ayah', 100)->nullable();
			$table->integer('pekerjaan_ayah_id')->unsigned()->nullable();
			$table->string('src_photo_ayah')->nullable();
			$table->string('nama_ibu', 100)->nullable();
			$table->integer('pekerjaan_ibu_id')->unsigned()->nullable();
			$table->string('src_photo_ibu')->nullable();
			$table->string('telepon', 20)->nullable();
			$table->string('hp', 20)->nullable();
			$table->string('src_photo')->nullable();
			$table->enum('status', array('A', 'P', 'M'))->nullable();
			$table->integer('tahun_akademik')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('santri');
	}
}