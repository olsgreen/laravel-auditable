<?php namespace Olsgreen\Auditable;

/**
 * Auditable
 * An easy to implement attribute audit 
 * log for Eloquent ORM in Laravel 4.X.
 * 
 * @author Oliver Green <green2go@gmail.com>
 * @version 1.0.0
 * @license http://opensource.org/licenses/MIT
 */

use Illuminate\Database\Eloquent\Model;

class Auditable {

	/**
	 * Gets Builder instance with predefined query 
	 * parameters for the input model parameter.
	 * 
	 * @param   Illuminate\Database\Eloquent\Model $model
	 * @return  Illuminate\Database\Eloquent\Builder
	 */
	public function get(Model $model)
	{
		// Grab the models PK
		$primarykey = (isset($model->primarykey)) 
							? $model->primarykey : 'id';

		return Changeset::where('object_type', '=', get_class($model))
							->where('object_id', '=', $model->$primarykey);
	}

	/**
	 * Records differences between dirty and 
	 * clean attributes to the database.
	 * 
	 * @param  Illuminate\Database\Eloquent\Model $model
	 * @return boolean Whether there was a Changeset created
	 */
	public function record(Model $model)
	{
		$dirty = $model->getDirty();

		// Remove dirty keys not in the auditable array
		if (isset($model->auditable) && is_array($model->auditable) 
				&& !in_array('*', $model->auditable)) {
			$dirty = array_intersect_key($dirty, array_flip($model->auditable));
		}

		if ($model->exists && count($dirty) > 0) {

			// Grab the models PK
			$primarykey = (isset($model->primarykey)) 
								? $model->primarykey : 'id';

			/*
			* -------------------------------------------------
			* Create the Changeset
			* -------------------------------------------------
			* We have to improvise a little here as we 
			* don't want to depend on models having 
			* relationships with the Auditable Changeset model.
			*/
			$cs = new Changeset;
			$cs->object_type = get_class($model); // Manual
			$cs->object_id = $model->$primarykey; // Manual
			$cs->user_id = \Auth::user()->id;
			$cs->save();

			// Add the Changeset changes
			foreach ($dirty as $k=>$v) {
				$change = new Change;
				$change->key = $k;
				$change->old_value = $model->getOriginal($k);
				$change->new_value = $v;
				$cs->changes()->save($change);
			}

			return true;
		}

		return false;
	}

}