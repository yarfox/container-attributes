<?php
/**
 * The file is part of the container-attributes.
 *
 * (c) anhoder <anhoder@88.com>.
 *
 * 2022/7/23 12:50
 */

namespace Yarfox\Container\Handler;

use Attribute;
use Yarfox\Attribute\Attribute\AttributeHandler;
use Yarfox\Attribute\Handler\AbstractHandler;
use Yarfox\Container\Attribute\Producer;
use Yarfox\Container\Contract\ProducerInterface;
use Yarfox\Container\Exception\InvalidProducerException;
use Yarfox\Container\Facade\Container;

#[AttributeHandler(Producer::class)]
class ProducerHandler extends AbstractHandler
{
    /**
     * @throws InvalidProducerException
     */
    public function handle(): void
    {
        /** @var Producer $attribute */
        $attribute = $this->attribute;

        $key = $attribute->getKey();
        switch ($this->target) {
            case Attribute::TARGET_CLASS:
                $className = $this->reflectionClass->getName();
                $producer = Container::getInstance($className);
                if (!$producer instanceof ProducerInterface) {
                    throw new InvalidProducerException("Class($className) is not instance of \Yarfox\Container\Contract\ProducerInterface");
                }
                break;
            case Attribute::TARGET_METHOD:
            case Attribute::TARGET_FUNCTION:
                $producerObj = null;
                if ($this->reflectionClass) {
                    $producerClass = $this->reflectionClass->getName();
                    $producerObj = Container::getInstance($producerClass);
                }
                $producerMethod = $this->reflectionMethod?->getName();
                $producerFunction = $this->reflectionFunction?->getName();
                $producer = new class($producerObj, $producerMethod, $producerFunction) implements ProducerInterface {
                    public function __construct(
                        private ?object $producerObj,
                        private ?string $producerMethod,
                        private ?string $producerFunction,
                    ) {}

                    public function produce(): object
                    {
                        if ($this->producerObj) {
                            return call_user_func([$this->producerObj, $this->producerMethod]);
                        }
                        return call_user_func($this->producerFunction);
                    }
                };
                break;
            default:
                throw new InvalidProducerException("Target({$this->target}) error");
        }

        Container::registerProducer($key, $producer);
    }
}
