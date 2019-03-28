<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePekerjaanTable extends Migration {

	public function up()
	{
		Schema::create('pekerjaan', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama', 50);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('pekerjaan');
	}
}