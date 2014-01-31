<?php namespace Olsgreen\Auditable;

use Illuminate\Support\Facades\Facade;

class AuditableFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'auditable'; }

}