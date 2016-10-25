<?php
namespace TheCodingMachine\Pimple\Fixtures;

use Interop\Container\ContainerInterface;
use Interop\Container\ServiceProvider;

class TestBridgeServiceProvider implements ServiceProvider
{
    public function getServices()
    {
        return array(
            'param' => array(TestBridgeServiceProvider::class, 'getParam'),
            'service' => function() {
                return new Service();
            },
            'previous' => array(TestBridgeServiceProvider::class, 'getPrevious'),
        );
    }

    public static function getParam()
    {
        return 'value';
    }

    public static function getPrevious(ContainerInterface $container, callable $getPrevious = null)
    {
        return $getPrevious;
    }
}
