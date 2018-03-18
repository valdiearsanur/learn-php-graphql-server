<?php
namespace Project\Product\Dao;

interface ProductDaoInterface
{
	public function getId();

	public function getName();

	public function setName($name);

	public function getPrice();

	public function setPrice($price);
}
