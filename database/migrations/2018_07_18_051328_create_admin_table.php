<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminTable extends Migration {

	public function up()
	{
		Schema::create('admin', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nickname', 6);
			$table->string('passcode');
			$table->string('nama', 100);
			$table->enum('status', array('N', 'A'));
			$table->enum('mod_santri', array('N', 'Y'));
			$table->enum('mod_pendidik', array('N', 'Y'));
			$table->enum('mod_su', array('N', 'Y'));
			$table->enum('mod_akademik', array('N', 'Y'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('admin');
	}
}