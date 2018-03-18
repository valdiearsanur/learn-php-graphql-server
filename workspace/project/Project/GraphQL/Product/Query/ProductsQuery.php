<?php
namespace Project\GraphQL\Product\Query;

use GraphQL\Type\Definition\Type;
use Project\GraphQL\Product\Resolver\ProductResolver;
use Project\GraphQL\Product\TypeAccessor\ProductTypeAccessor;

class ProductsQuery
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
			'type' => Type::listOf($this->accessor::get()),
			'description' => 'Return List of Products',
			'args' => [
				'after' => [
					'type' => Type::id(),
					'description' => 'Fetch after ID'
				],
				'limit' => [
					'type' => Type::int(),
					'description' => 'Limit',
					'defaultValue' => 10
				]
			],
			'resolve' => function ($root, $args) {
				$result = $this->resolver->resolveProducts();

				return $result;
			}
		];

		return $query;
	}
}

use GraphQL\Error\ClientAware;

class MySafeException extends \Exception implements ClientAware
{
    public function isClientSafe()
    {
        return true;
    }
    
    public function getCategory()
    {
        return 'businessLogic';
    }
}
