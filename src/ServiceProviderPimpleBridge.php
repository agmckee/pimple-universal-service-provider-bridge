<?php

namespace TheCodingMachine\Pimple;

use Acclimate\Container\CompositeContainer;
use Acclimate\Container\ContainerAcclimator;
use Interop\Container\ContainerInterface;
use Interop\Container\ServiceProvider;
use Pimple\Container;

/**
 * A bridge that allows you to register container-interop/service-providers in Pimple 3.
 */
class ServiceProviderPimpleBridge
{
    /**
     * @var Container
     */
    private $pimple;

    /**
     * @var ContainerInterface
     */
    private $acclimatedPimple;

    /**
     * @param Container $pimple
     */
    public function __construct(Container $pimple)
    {
        $acclimator = new ContainerAcclimator();
        $this->pimple = $pimple;
        $this->acclimatedPimple = $acclimator->acclimate($pimple);
    }

    /**
     * Registers a service provider.
     *
     * @param ServiceProvider $provider the service provider to register
     * @param array $values An array of values that customizes the provider
     *
     * @return static
     */
    public function register(ServiceProvider $provider, array $values = array())
    {
        $entries = $provider->getServices();
        foreach ($entries as $key => $callable) {
            if (isset($this->pimple[$key])) {
                // Extend a previous entry
                $this->pimple[$key] = $this->pimple->extend($key, function ($previous, Container $c) use ($callable) {
                    $getPrevious = function () use ($previous) {
                        return $previous;
                    };
                    return call_user_func($callable, $this->acclimatedPimple, $getPrevious);
                });
            } else {
                $this->pimple[$key] = function (Container $c) use ($callable) {
                    return call_user_func($callable, $this->acclimatedPimple, null);
                };
            }
        }
        foreach ($values as $key => $value) {
            $this->pimple[$key] = $value;
        }
        return $this;
    }
}
