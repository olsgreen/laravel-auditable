<?php namespace Olsgreen\Auditable;

use Illuminate\Database\Eloquent\Model;

class Observer {

	public function saving($model)
    {
        $a = new Auditable;
        $a->record($model);
    }

}