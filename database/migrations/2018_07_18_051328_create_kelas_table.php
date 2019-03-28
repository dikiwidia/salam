<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKelasTable extends Migration {

	public function up()
	{
		Schema::create('kelas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('kode_kelas', 10)->unique();
			$table->string('nama', 50)->nullable();
			$table->integer('kapasitas')->nullable();
			$table->enum('jenjang', array('SD', 'SMP', 'SMA'));
			$table->integer('wali_kelas')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('kelas');
	}
}