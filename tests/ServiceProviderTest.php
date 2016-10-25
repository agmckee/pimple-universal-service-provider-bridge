<?php

namespace TheCodingMachine\Pimple;

use Pimple\Container;
use TheCodingMachine\Pimple\Fixtures\TestBridgeServiceProvider;

/**
 * Test suite forked from mnapoli/simplex
 *
 * @author Dominik Zogg <dominik.zogg@gmail.com>
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 * @author David Négrier <d.negrier@thecodingmachine.com>
 */
class ServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testProvider()
    {
        $pimple = new Container();

        $bridge = new ServiceProviderPimpleBridge($pimple);

        $bridge->register(new TestBridgeServiceProvider());

        $this->assertEquals('value', $pimple['param']);
        $this->assertInstanceOf('TheCodingMachine\Pimple\Fixtures\Service', $pimple['service']);
    }

    public function testProviderWithRegisterMethod()
    {
        $pimple = new Container();

        $bridge = new ServiceProviderPimpleBridge($pimple);

        $bridge->register(new TestBridgeServiceProvider(), array(
            'anotherParameter' => 'anotherValue',
        ));

        $this->assertEquals('value', $pimple['param']);
        $this->assertEquals('anotherValue', $pimple['anotherParameter']);

        $this->assertInstanceOf('TheCodingMachine\Pimple\Fixtures\Service', $pimple['service']);
    }

    //Extending values is no more allowed in Pimple 3
    /*public function testExtendingValue()
    {
        $pimple = new Container();
        $bridge = new ServiceProviderPimpleBridge($pimple);

        $pimple['previous'] = 'foo';
        $bridge->register(new TestBridgeServiceProvider());
        $getPrevious = $pimple['previous'];
        $this->assertEquals('foo', $getPrevious());
    }*/

    public function testExtendingNothing()
    {
        $pimple = new Container();
        $bridge = new ServiceProviderPimpleBridge($pimple);

        $bridge->register(new TestBridgeServiceProvider());
        $this->assertNull($pimple['previous']);
    }
}
