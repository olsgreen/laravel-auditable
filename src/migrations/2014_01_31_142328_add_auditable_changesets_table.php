<?php

use Illuminate\Database\Migrations\Migration;

class AddAuditableChangesetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auditable_changesets', function($table) 
		{
			$table->increments('id');
			$table->string('object_type');
			$table->integer('object_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			$table->index(array('object_id', 'object_type'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auditable_changesets');
	}

}