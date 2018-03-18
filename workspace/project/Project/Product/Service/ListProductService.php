<?php
namespace Project\Product\Service;

use Project\Product\Repository\ProductRepositoryInterface;

class ListProductService 
{
	private $repo;

	public function __construct(ProductRepositoryInterface $productRepository)
	{
		$this->repo = $productRepository;
	}

	public function getAllProducts()
	{
		$result = $this->repo->getMany();

		return $result;
	}

	public function getProduct($id)
	{
		$result = $this->repo->get($id);

		return $result;
	}
}
