<?php declare(strict_types=1);

namespace App\Tests\Entity;

trait PrivateAttributeAccess
{
    private static function setPrivateAttribute(object $object, string $attributeName, mixed $attributeValue, ?string $fromClass = null): void
    {
        if (is_null($fromClass)) {
            $fromClass = get_class($object);
        }
        $reflectionClass = new \ReflectionClass($fromClass);
        $attribute = $reflectionClass->getProperty($attributeName);
        $attribute->setValue($object, $attributeValue);
    }

}
