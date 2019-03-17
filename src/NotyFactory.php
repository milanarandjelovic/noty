<?php

namespace MA\Noty;

use RuntimeException;
use MA\Noty\Contracts\NotyInterface;

/**
 * Class NotyFactory
 *
 * @package MA\Noty
 */
class NotyFactory
{

    /**
     * @param array $config
     * @return NotyInterface
     */
    public static function make(array $config): NotyInterface
    {
        $driver = $config['default'];

        if (! isset($config[$driver])) {
            throw new RuntimeException('Unknown ' . $driver . ' notification diver.');
        }

        $class = $config[$driver]['class'];

        if (! class_exists($class)) {
            throw new RuntimeException('Class ' . $class . ' not exists.');
        }

        return new $class($config[$driver]);
    }
}
