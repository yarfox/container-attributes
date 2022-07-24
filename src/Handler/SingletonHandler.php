<?php
/**
 * The file is part of the container-attributes.
 *
 * (c) anhoder <anhoder@88.com>.
 *
 * 2022/07/19 23:30
 */

namespace Yarfox\Container\Handler;

use Attribute;
use Yarfox\Attribute\Handler\AbstractHandler;
use Yarfox\Container\Attribute\Singleton;
use Yarfox\Container\Facade\Container;

/**
 * Class Handler
 * @package Yarfox\Container
 */
class SingletonHandler extends AbstractHandler
{
    public function handle(): void
    {
        if ($this->target != Attribute::TARGET_CLASS || !$this->reflectionClass) {
            return;
        }

        /** @var Singleton $attribute */
        $attribute = $this->attribute;
        $key = $attribute->getKey() ?: $this->reflectionClass->getName();

        Container::registerSingletonProducer($key, $this->reflectionClass->getName());
    }
}
