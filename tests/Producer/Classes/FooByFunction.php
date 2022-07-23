<?php
/**
 * The file is part of the container-attributes.
 *
 * (c) anhoder <anhoder@88.com>.
 *
 * 2022/7/23 19:04
 */

namespace Yarfox\Container\Test\Producer\Classes;

class FooByFunction
{
    public function __construct(
        private string $empty,
    ) {}

    public function bar()
    {
        return "Foo::bar from function";
    }
}
