<?php 
namespace Project\Product\Factory;

use Project\Product\Dao\ProductDaoInterface;
use Project\Product\Entity\Product;

class ProductFactory
{
	public function create(
		$id,
		$name,
		$price
	) {
		$product = new Product(
			$id,
			$name,
			$price
		);

		return $product;
	}

	public function fromDao(
		ProductDaoInterface $productDao
	) {
		$product = new Product(
			$productDao->getId(),
			$productDao->getName(),
			$productDao->getPrice()
		);

		return $product;
	}
}
