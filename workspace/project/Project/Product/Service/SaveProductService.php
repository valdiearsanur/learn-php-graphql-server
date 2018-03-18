<?php
namespace Project\Product\Service;

use Project\Product\Factory\ProductFactory;
use Project\Product\Repository\ProductRepositoryInterface;

class SaveProductService
{
	private $repo;
	private $factory;

	public function __construct(
		ProductRepositoryInterface $productRepository,
		ProductFactory $productFactory
	) {
		$this->repo = $productRepository;
		$this->factory = $productFactory;
	}

	public function save(
		$id,
		$name,
		$price
	) {
		$product = $this->factory->create(
			$id,
			$name,
			$price
		);
		$result = $this->repo->save($product);

		return $result;
	}
}
