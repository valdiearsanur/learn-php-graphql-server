<?php
namespace Project\GraphQL\Product\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Project\Product\Entity\Product;

class ProductType extends ObjectType
{
	const ID = 'id';
	const NAME = 'name';
	const PRICE = 'price';

	public function __construct() {
		$config = [
			'name' => 'Product',
			'fields' => [
				self::ID => [
					'type' => Type::string(),
					'description' => 'id'
				],
				self::NAME => [
					'type' => Type::string(),
					'description' => 'name'
				],
				self::PRICE => [
					'type' => Type::string(),
					'description' => 'price'
				]
			],
			'resolveField' => function(
				Product $product,
				$args,
				$context,
				ResolveInfo $info
			) {
				$fieldName = $info->fieldName;
                $method = 'resolve' . ucfirst($fieldName);

				$result = null;
				if (method_exists($this, $method)) {
                    $result = $this->{$method}($product, $args, $context, $info);
				}

				return $result;
			}
		];
		parent::__construct($config);
	}

	private function resolveId(Product $product)
	{
		$result = $product->getId();

		return $result;
	}

	private function resolveName(Product $product)
	{
		$result = $product->getName();

		return $result;
	}

	private function resolvePrice(Product $product)
	{
		$result = $product->getPrice();

		return $result;
	}

	public function deprecatedField()
	{
		return 'You can request deprecated field, but it is not displayed in auto-generated documentation by default.';
	}
}
