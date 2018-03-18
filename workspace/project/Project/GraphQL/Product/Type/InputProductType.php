<?php
namespace Project\GraphQL\Product\Type;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Project\Product\Entity\Product;

class InputProductType extends InputObjectType
{
	const ID = 'id';
	const NAME = 'name';
	const PRICE = 'price';

	public function __construct() {
		$config = [
			'name' => 'ProductInput',
			'fields' => [
				self::ID => [
					'type' => Type::string(),
					'description' => 'id'
				],
				self::NAME => [
					'type' => Type::string(),
					'description' => 'name',
					'defaultValue' => ''
				],
				self::PRICE => [
					'type' => Type::string(),
					'description' => 'price',
					'defaultValue' => '0'
				]
			]
		];
		parent::__construct($config);
	}

	public function deprecatedField()
	{
		return 'You can request deprecated field, but it is not displayed in auto-generated documentation by default.';
	}
}
