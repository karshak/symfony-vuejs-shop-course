<?php

namespace App\Entity\StaticStorage;

class OrderStaticStorage
{
    public const ORDER_STATIC_CREATED = 0;
    public const ORDER_STATIC_PROCESSED = 1;
    public const ORDER_STATIC_COMPLECTED = 2;
    public const ORDER_STATIC_DELIVERED = 3;
    public const ORDER_STATIC_DENIED = 4;

    /**
     * @return string[]
     */
    public static function getOrderStaticChoices(): array
    {
        return [
            self::ORDER_STATIC_CREATED => 'Created',
            self::ORDER_STATIC_PROCESSED => 'Processed',
            self::ORDER_STATIC_COMPLECTED => 'Complected',
            self::ORDER_STATIC_DELIVERED => 'Delivered',
            self::ORDER_STATIC_DENIED => 'Denied',
        ];
    }
}