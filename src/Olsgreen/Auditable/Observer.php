<?php namespace Olsgreen\Auditable;

use Illuminate\Database\Eloquent\Model;

class Observer {

	public function saving($model)
    {
        $a = new Auditable;
        $a->recordChange($model);
    }

    public function created($model)
    {
    	$a = new Auditable;
        $a->recordCreate($model);
    }

    public function deleting($model)
    {
    	$a = new Auditable;
        $a->recordDelete($model);
    }

}