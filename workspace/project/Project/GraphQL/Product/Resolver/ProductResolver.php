<?php
namespace Project\GraphQL\Product\Resolver;

use Project\Product\Service\GetManyProductService;
use Project\Product\Service\GetOneProductService;

class ProductResolver
{
	private $getManyService;
	private $getOneService;

	public function __construct(
		GetManyProductService $getManyProductService,
		GetOneProductService $getOneProductService
	) {
		$this->getManyService = $getManyProductService;
		$this->getOneService = $getOneProductService;
	}

	public function resolveProducts()
	{
		$result = $this->getManyService->execute();
		return $result;
	}

	public function resolveProduct($id)
	{
		$result = $this->getOneService->execute($id);
		return $result;
	}
}
