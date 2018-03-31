<?php
namespace Project\Persistance\Doctrine\Product\Repository;

use Project\Persistance\Doctrine\Product\Dao\ProductDao;
use Project\Persistance\Doctrine\Db\MongoConnection;
use Project\Product\DaoFactory\ProductDaoFactoryInterface;
use Project\Product\Factory\ProductFactory;
use Project\Product\Entity\Product;
use Project\Product\Repository\ProductRepositoryInterface;
use \MongoId;

class ProductRepository implements ProductRepositoryInterface
{
	private $db;
	private $factory;

	public function __construct(
		MongoConnection $db,
		ProductFactory $productFactory,
		ProductDaoFactoryInterface $productDaoFactory
	) {
		$this->db = $db->getConnection();
		$this->factory = $productFactory;
		$this->daoFactory = $productDaoFactory;
	}

	public function save(Product $product)
	{
		$productDao = $this->daoFactory->create(
			$product->getName(),
			$product->getPrice()
		);

		$this->db->persist($productDao);
		$this->db->flush();

		$result = $this->factory->fromDao($productDao);

		return $result;
	}

	public function getMany($filter, $limit, $sort)
	{
		$records = $this->db->getRepository(ProductDao::class)->findAll();

		$result = [];
		foreach ($records as $record) {
			$result[] = $this->factory->fromDao($record);
		}

		return $result;
	}

	public function get($id)
	{
		$record = $this->db->getRepository(ProductDao::class)->findOneById($id);

		if(empty($record)) {
			return null;
		}

		$result = $this->factory->fromDao($record);

		return $result;
	}
}
