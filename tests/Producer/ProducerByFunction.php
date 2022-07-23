<?php
/**
 * The file is part of the container-attributes.
 *
 * (c) anhoder <anhoder@88.com>.
 *
 * 2022/7/23 19:04
 */

namespace Yarfox\Container\Test\Producer;

use Yarfox\Container\Attribute\Producer;
use Yarfox\Container\Test\Producer\Classes\FooByFunction;

if (!function_exists('\Yarfox\Container\Test\Producer\producerByFunction')) {
    #[Producer(FooByFunction::class)]
    function producerByFunction() {
        return new FooByFunction('empty');
    }
}
