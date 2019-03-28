<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePertemuanTable extends Migration {

	public function up()
	{
		Schema::create('pertemuan', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('pertemuan');
	}
}