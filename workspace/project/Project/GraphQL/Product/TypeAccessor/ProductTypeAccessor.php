<?php
namespace Project\GraphQL\Product\TypeAccessor;

use Project\GraphQL\Product\Type\ProductType;

class ProductTypeAccessor
{
	private static $type;

    public static function get()
    {
        return self::$type ?: (self::$type = new ProductType());
    }
}
