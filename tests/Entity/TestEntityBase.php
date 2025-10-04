<?php declare(strict_types=1);

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;

abstract class TestEntityBase extends TestCase
{
    protected static function setPrivateAttribute(object $object, string $attributeName, mixed $attributeValue, ?string $fromClass = null): void
    {
        if (is_null($fromClass)) {
            $fromClass = get_class($object);
        }
        $reflectionClass = new \ReflectionClass($fromClass);
        $attribute = $reflectionClass->getProperty($attributeName);
        $attribute->setValue($object, $attributeValue);
    }
}
