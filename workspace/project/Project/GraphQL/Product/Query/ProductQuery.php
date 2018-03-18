<?php
namespace Project\GraphQL\Product\Query;

use GraphQL\Type\Definition\Type;
use Project\GraphQL\Product\Resolver\ProductResolver;
use Project\GraphQL\Product\TypeAccessor\ProductTypeAccessor;

class ProductQuery
{
	private $resolver;

	public function __construct(
		ProductTypeAccessor $accessor,
		ProductResolver $resolver
	) {
		$this->accessor = $accessor;
		$this->resolver = $resolver;
	}

	public function getQuery()
	{
		$query = [
			'type' => $this->accessor::get(),
			'description' => 'Return Product by Id',
			'args' => [
				'id' => [
					'type' => Type::id(),
					'description' => 'Product ID'
				]
			],
			'resolve' =>  function ($val, $args) {
				$id = $args['id'];
				$result = $this->resolver->resolveProduct($id);

				return $result;
			}
		];

		return $query;
	}
}
