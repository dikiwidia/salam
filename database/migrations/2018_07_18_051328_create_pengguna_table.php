<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePenggunaTable extends Migration {

	public function up()
	{
		Schema::create('pengguna', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nickname', 6);
			$table->string('passcode');
			$table->integer('guru')->unsigned()->nullable();
			$table->enum('status', array('N', 'A'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('pengguna');
	}
}