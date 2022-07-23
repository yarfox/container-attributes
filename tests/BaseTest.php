<?php
/**
 * The file is part of the container-attributes.
 *
 * (c) anhoder <anhoder@88.com>.
 *
 * 2022/7/23 19:06
 */

namespace Yarfox\Container\Test;

use Closure;
use PHPUnit\Framework\TestCase;
use Yarfox\Attribute\AttributeKeeper;
use Yarfox\Attribute\ConfigCollector;
use Yarfox\Attribute\Contract\LoggerInterface;
use Yarfox\Container\Facade\Container;

abstract class BaseTest extends TestCase
{
    protected function boot()
    {
        AttributeKeeper::bootloader();

        /** @var LoggerInterface $logger */
        //$logger = Container::getInstance(LoggerInterface::class);
        //$logger->setLevel(LoggerInterface::LEVEL_SUCCESS);

        /** @var ConfigCollector $collector */
        $collector = Container::getInstance(ConfigCollector::class);

        // Inject fake data
        Closure::bind(function () use ($collector) {
            $collector->configs['Yarfox\\Container\\Test\\'] = [
                'scanDirs' => [
                    'Yarfox\\Container\\Test' => realpath(__DIR__),
                    'Yarfox\\Container\\' => realpath(__DIR__ . '/../src'),
                ],
                'functions' => [
                    '\Yarfox\Container\Test\Producer\producerByFunction'
                ],
            ];
        }, null, ConfigCollector::class)();
        AttributeKeeper::collect();
    }
}
