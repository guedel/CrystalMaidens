<?php declare(strict_types=1);

namespace App\Tests\Unit\Entity;

trait PrivateAttributeAccess
{
    /**
     * @template T of object
     * @param T $object
     * @param string $attributeName
     * @param mixed $attributeValue
     * @param string|null $fromClass
     * @throws \ReflectionException
     */
    private static function setPrivateAttribute(
        object  $object,
        string  $attributeName,
        mixed   $attributeValue,
        ?string $fromClass = null
    ): void {
        if (is_null($fromClass)) {
            $fromClass = get_class($object);
        }
        $reflectionClass = new \ReflectionClass($fromClass);
        $attribute = $reflectionClass->getProperty($attributeName);
        $attribute->setValue($object, $attributeValue);
    }

    /**
     * @template T of object
     * @param T $object
     * @param int $id
     * @return T
     */
    private static function setId(object $object, int $id): object
    {
        self::setPrivateAttribute($object, 'id', $id);
        return $object;
    }
}
