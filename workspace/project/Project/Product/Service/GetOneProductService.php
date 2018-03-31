<?php
namespace Project\Product\Service;

use Project\Product\Repository\ProductRepositoryInterface;

class GetOneProductService
{
	private $repo;

	public function __construct(ProductRepositoryInterface $productRepository)
	{
		$this->repo = $productRepository;
	}

	public function execute($id)
	{
		$result = $this->repo->get($id);

		return $result;
	}
}
