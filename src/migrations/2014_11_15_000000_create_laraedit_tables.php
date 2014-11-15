<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaraEditTables extends Migration {

	public function up()
	{
		Schema::create('laraedit_settings', function($t) {
			$t->increments('id');
			$t->timestamps();
		});	
	}

	public function down()
	{
		
	}

}
