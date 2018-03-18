<?php
namespace Project\Product\Repository;

use Project\Product\Entity\Product;

interface ProductRepositoryInterface
{
	public function save(Product $product);

	public function getMany();

	public function get($id);
}
