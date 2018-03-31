<?php
namespace Project\GraphQL\Product\Resolver;

use Project\Product\Service\SaveProductService;

class CreateProductResolver
{
	private $service;

	public function __construct(
		SaveProductService $productService
	) {
		$this->service = $productService;
	}

	public function resolve(
		$name,
		$price
	) {
		$result = $this->service->execute(null, $name, $price);
		return $result;
	}
}
