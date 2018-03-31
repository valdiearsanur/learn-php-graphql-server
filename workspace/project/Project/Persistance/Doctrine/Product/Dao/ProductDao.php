<?php
namespace Project\Persistance\Doctrine\Product\Dao;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Project\Product\Dao\ProductDaoInterface;

/** @ODM\Document(collection="product") */
class ProductDao implements ProductDaoInterface
{
	/** @ODM\Id */
	private $id;

	/** @ODM\Field(type="string") */
	private $name;

	/** @ODM\Field(type="int") */
	private $price;

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}
}
