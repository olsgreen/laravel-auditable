<?php namespace Olsgreen\Auditable;

use Illuminate\Database\Eloquent\Model;

class Changeset extends Model {

	/**
	 * The table associated with the model.
	 * 
	 * @var string
	 */
	protected $table = 'auditable_changesets';

	/**
	 * Get the Model that this changeset 
	 * relates to.
	 * 
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function object() 
	{
		return $this->morphTo();
	}

	/**
	 * Get the User that this changeset relates to.
	 * 
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function user()
	{
		$auth_model = \Config::get('auth.model');
        return $auth_model::find($this->user_id)->first();
	}

	/**
	 * Gets the changes that occured 
	 * within this set.
	 * 
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function changes()
	{
		return $this->hasMany('Olsgreen\Auditable\Change');
	}

}