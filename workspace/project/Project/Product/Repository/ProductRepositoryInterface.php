<?php
namespace Project\Product\Repository;

use Project\Product\Entity\Product;

interface ProductRepositoryInterface
{
	public function save(Product $product);

	public function getMany($filter, $limit, $sort);

	public function get($id);
}
