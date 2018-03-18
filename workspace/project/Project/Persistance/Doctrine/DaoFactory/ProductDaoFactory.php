<?php 
namespace Project\Persistance\Doctrine\DaoFactory;

use Project\Persistance\Doctrine\Dao\ProductDao;
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
