<?php namespace Olsgreen\Auditable;

use Illuminate\Database\Eloquent\Model;

class Change extends Model {

	/**
	 * The table associated with the model.
	 * 
	 * @var string
	 */
	protected $table = 'auditable_changes';

	/**
	 * Gets the changes Changeset
	 * @return Olsgreen\Auditable\Changeset
	 */
	public function changeset()
	{
		return $this->hasOne('Olsgreen\Auditable\Changeset');
	}

}