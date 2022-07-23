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
use Yarfox\Container\Test\Producer\Classes\FooByMethod;

class ProducerByMethod
{
    #[Producer(FooByMethod::class)]
    public function produceFoo()
    {
        return new FooByMethod('empty');
    }
}
