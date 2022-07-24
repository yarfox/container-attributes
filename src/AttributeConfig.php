<?php
/**
 * The file is part of the container-attributes.
 *
 * (c) anhoder <anhoder@88.com>.
 *
 * 2022/07/19 22:58
 */

namespace Yarfox\Container;

use Yarfox\Attribute\Contract\ConfigInterface;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class AttributeConfig
 * @package Yarfox\Container
 */
class AttributeConfig implements ConfigInterface
{
    /**
     * @inheritDoc
     */
    #[ArrayShape(['scanDirs' => 'array'])]
    public static function getAttributeConfigs(): array
    {
        return [
            'scanDirs' => [
                __NAMESPACE__ => __DIR__,
            ],
        ];
    }
}
