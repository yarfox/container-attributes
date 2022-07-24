<?php
/**
 * The file is part of the container-attributes.
 *
 * (c) anhoder <anhoder@88.com>.
 *
 * 2022/07/19 22:58
 */

namespace Yarfox\Container\Attribute;

use Attribute;

/**
 * Singleton is an attribute used to mark the tagged class as an singleton class in yarfox/container.
 * @package Yarfox\Container\Attribute
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Singleton
{
    public function __construct(
        private ?string $key = null,
    ) {}

    /**
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }
}
