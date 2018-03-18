<?php
namespace Project\GraphQL\Product\Mutation;

use GraphQL\Type\Definition\Type;
use Project\GraphQL\Product\Resolver\CreateProductResolver;
use Project\GraphQL\Product\TypeAccessor\ProductTypeAccessor;

class ProductMutation
{
	private $resolver;

	public function __construct(
		ProductTypeAccessor $accessor,
		CreateProductResolver $resolver
	) {
		$this->accessor = $accessor;
		$this->resolver = $resolver;
	}

	public function getMutation()
	{
		$mutation = [
			'type' => $this->accessor::get(),
			'description' => 'Insert Product',
			'args' => [
				'name' => [
					'type' => Type::string(),
					'description' => 'Product Name'
				],
				'price' => [
					'type' => Type::string(),
					'description' => 'Price'
				]
			],
			'resolve' => function($val, $args) {
				$name = $args['name'];
				$price = $args['price'];
				$result = $this->resolver->resolve($name, $price);

				return $result;
			}
		];

		return $mutation;
	}
}
