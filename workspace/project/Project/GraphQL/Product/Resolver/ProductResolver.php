<?php
namespace Project\GraphQL\Product\Resolver;

use Project\Product\Service\ListProductService;

class ProductResolver
{
	private $service;

	public function __construct(
		ListProductService $productService
	) {
		$this->service = $productService;
	}

	public function resolveProducts()
	{
		$result = $this->service->getAllProducts();
		return $result;
	}

	public function resolveProduct($id)
	{
		$result = $this->service->getProduct($id);
		return $result;
	}
}
