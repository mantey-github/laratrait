<?php

namespace Mantey\Laratrait;

use Illuminate\Support\Facades\Facade;

class LaratraitFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laratrait';
    }
}
