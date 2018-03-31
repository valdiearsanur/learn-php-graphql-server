<?php 
namespace Project\Persistance\Doctrine\Product\DaoFactory;

use Project\Persistance\Doctrine\Product\Dao\ProductDao;
use Project\Product\DaoFactory\ProductDaoFactoryInterface;

class ProductDaoFactory implements ProductDaoFactoryInterface
{
	public function create(
		$name,
		$price
	) {
		$dao = new ProductDao();
		$dao->setName($name);
		$dao->setPrice($price);

		return $dao;
	}
}
