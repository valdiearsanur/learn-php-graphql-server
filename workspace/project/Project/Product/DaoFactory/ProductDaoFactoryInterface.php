<?php 
namespace Project\Product\DaoFactory;

interface ProductDaoFactoryInterface
{
	public function create(
		$name,
		$price
	);
}
