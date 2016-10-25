# container-interop/service-provider bridge for Pimple

Register `service-providers` as defined in `container-interop` into a Pimple 3 container.

## Installation

Add the package in composer:

```sh
composer require thecodingmachine/pimple-universal-service-provider-bridge ^1.0
```

## Usage

```php
use TheCodingMachine\Pimple\ServiceProviderPimpleBridge;

// Create your pimple container
$pimple = new Pimple\Container();

// Create the bridge
$bridge = new ServiceProviderPimpleBridge($pimple);

// Now, register any service provider you like (compatible with container-interop/service-provider) on the bridge
$bridge->register(new GlideServiceProvider());
```
