<?php
namespace Project\GraphQL;

use GraphQL\Type\Definition\ObjectType;
use Project\GraphQL\Product\Mutation\ProductMutation;

class Mutation extends ObjectType
{
	public function __construct(
		ProductMutation $productMutation
	) {
		$config = [
			'name' => 'Mutation',
			'fields' => function() use (
				$productMutation
			) {
				$fields = [
					'createProduct' => $productMutation->getMutation()
				];
	
				return $fields;
			}
		];
		parent::__construct($config);
	}
}
