<?php
namespace Project\Product\Service;

use Project\Product\Repository\ProductRepositoryInterface;

class GetManyProductService
{
	private $repo;
	private $fields;
	private $filter = [];
	private $sort = [];
	private $limit = 0;

	public function __construct(ProductRepositoryInterface $productRepository)
	{
		$this->repo = $productRepository;
	}

	public function setFields($fields)
	{
		$this->fields = $fields;
	}

	public function setFilter($filter)
	{
		$this->filter = $filter;
	}

	public function setLimit($limit)
	{
		$this->limit = $limit;
	}

	public function setSort($sort)
	{
		$this->sort = $sort;
	}

	public function execute()
	{
		$result = $this->repo->getMany(
			$this->filter,
			$this->limit,
			$this->sort
		);

		return $result;
	}
}
