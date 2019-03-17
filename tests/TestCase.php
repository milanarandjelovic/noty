<?php

namespace MA\Noty\Tests;

use MA\Noty\NotyServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            NotyServiceProvider::class,
        ];
    }
}
