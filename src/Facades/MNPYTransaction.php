<?php

namespace MNPY\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class MNPYTransaction extends Facade {
    /**
     * Return facade accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'MNPYTransaction';
    }
}