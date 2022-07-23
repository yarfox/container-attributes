<?php

namespace Yarfox\Container\Test\Producer;

use Yarfox\Container\Facade\Container;
use Yarfox\Container\Test\BaseTest;
use Yarfox\Container\Test\Producer\Classes\FooByClass;
use Yarfox\Container\Test\Producer\Classes\FooByFunction;
use Yarfox\Container\Test\Producer\Classes\FooByMethod;

class ProducerTest extends BaseTest
{
    public function testFromContainerDirectly()
    {
        $this->assertNull(Container::getInstance(FooByClass::class));
        $this->assertNull(Container::getInstance(FooByMethod::class));
        $this->assertNull(Container::getInstance(FooByFunction::class));
    }

    public function testProducerByClass()
    {
        $this->boot();
        /** @var FooByClass $foo */
        $foo = Container::getInstance(FooByClass::class);
        $this->assertEquals('Foo::bar from class', $foo->bar());
    }

    public function testProducerByMethod()
    {
        $this->boot();
        /** @var FooByMethod $foo */
        $foo = Container::getInstance(FooByMethod::class);
        $this->assertEquals('Foo::bar from method', $foo->bar());
    }

    public function testProducerByFunction()
    {
        $this->boot();
        /** @var FooByFunction $foo */
        $foo = Container::getInstance(FooByFunction::class);
        $this->assertEquals('Foo::bar from function', $foo->bar());
    }
}
