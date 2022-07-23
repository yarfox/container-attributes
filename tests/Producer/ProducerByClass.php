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
use Yarfox\Container\Contract\ProducerInterface;
use Yarfox\Container\Test\Producer\Classes\FooByClass;

#[Producer(FooByClass::class)]
class ProducerByClass implements ProducerInterface
{
    public function produce(): object
    {
        return new FooByClass('empty');
    }
}
