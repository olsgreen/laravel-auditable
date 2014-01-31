<?php

use Illuminate\Database\Migrations\Migration;

class AddAuditableChangesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auditable_changes', function($table) {
			$table->increments('id');
			$table->integer('changeset_id')->unsigned();
			$table->string('key')->nullable();
			$table->text('old_value')->nullable();
			$table->text('new_value')->nullable();	
			$table->timestamps();		
			$table->index(array('changeset_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auditable_changes');
	}

}