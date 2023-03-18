<?php

namespace IngressITSolutions\Packagist\Tests;

use Illuminate\Foundation\Application;
use IngressITSolutions\Packagist\PackagistServiceProvider;
use Orchestra\Testbench\TestCase;

class LaravelTestCase extends TestCase
{
    /**
     * Get package providers.
     *
     * @param Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            PackagistServiceProvider::class,
        ];
    }
}
