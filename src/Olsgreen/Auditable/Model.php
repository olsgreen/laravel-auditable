<?php namespace Olsgreen\Auditable;

class Model extends Illuminate\Database\Eloquent\Model {

	/**
	 * The attributes that are auditable.
	 * 
	 * @var array
	 */
	public $auditable = array('*');

	/**
	 * Attach our Auditable event observer
	 * 
	 * @return void
	 */
	public static function boot()
	{
		parent::boot();
		self::observe(new Olsgreen\Auditable\Observer);
	}

}