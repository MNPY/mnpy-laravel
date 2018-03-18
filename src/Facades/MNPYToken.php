<?php

namespace MNPY\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class MNPYToken extends Facade {
    /**
     * Return facade accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'MNPYToken';
    }
}