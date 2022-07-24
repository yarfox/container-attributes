<?php
/**
 * The file is part of the container-attributes.
 *
 * (c) anhoder <anhoder@88.com>.
 *
 * 2022/7/23 12:26
 */

namespace Yarfox\Container\Attribute;

use Attribute;
use Yarfox\Container\Constant\Scope;

#[Attribute(Attribute::TARGET_CLASS|Attribute::TARGET_FUNCTION|Attribute::TARGET_METHOD)]
class Producer
{
    public function __construct(
        private string $key,
        private string $scope = Scope::SCOPE_PROTOTYPE,
    ) {}

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope;
    }
}
