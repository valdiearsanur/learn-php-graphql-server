<?php
namespace Project\GraphQL;

use GraphQL\Type\Definition\ObjectType;
use Project\GraphQL\Product\Query\ProductQuery;
use Project\GraphQL\Product\Query\ProductsQuery;

class Query extends ObjectType
{
	public function __construct(
		ProductQuery $productQuery,
		ProductsQuery $productsQuery
	) {
		$config = [
			'name' => 'Query',
			'fields' => function() use (
				$productQuery,
				$productsQuery
			) {
				$fields = [
					'product' => $productQuery->getQuery(),
					'products' => $productsQuery->getQuery()
				];
	
				return $fields;
			}
		];
		parent::__construct($config);
	}
}
