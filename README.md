[![Latest Stable Version](https://poser.pugx.org/thecodingmachine/pimple-universal-service-provider-bridge/v/stable.svg)](https://packagist.org/packages/thecodingmachine/pimple-universal-service-provider-bridge)
[![Latest Unstable Version](https://poser.pugx.org/thecodingmachine/pimple-universal-service-provider-bridge/v/unstable.svg)](https://packagist.org/packages/thecodingmachine/pimple-universal-service-provider-bridge)
[![License](https://poser.pugx.org/thecodingmachine/pimple-universal-service-provider-bridge/license.svg)](https://packagist.org/packages/thecodingmachine/pimple-universal-service-provider-bridge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/thecodingmachine/pimple-universal-service-provider-bridge/badges/quality-score.png?b=1.0)](https://scrutinizer-ci.com/g/thecodingmachine/pimple-universal-service-provider-bridge/?branch=1.0)
[![Build Status](https://travis-ci.org/thecodingmachine/pimple-universal-service-provider-bridge.svg?branch=1.0)](https://travis-ci.org/thecodingmachine/pimple-universal-service-provider-bridge)
[![Coverage Status](https://coveralls.io/repos/thecodingmachine/pimple-universal-service-provider-bridge/badge.svg?branch=1.0)](https://coveralls.io/r/thecodingmachine/pimple-universal-service-provider-bridge?branch=1.0)


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
