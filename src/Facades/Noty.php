<?php

namespace MA\Noty\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Noty
 *
 * @package MA\Noty\Facades
 */
class Noty extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor(): string
    {
        return 'noty';
    }
}
