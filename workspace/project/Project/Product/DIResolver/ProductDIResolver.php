<?php
namespace Project\Product\DIResolver;

use Project\DependencyInjection\DIResolver;
use Project\Product\DaoFactory\ProductDaoFactoryInterface;
use Project\Product\Repository\ProductRepositoryInterface;
use Project\Persistance\Doctrine\DaoFactory\ProductDaoFactory;
use Project\Persistance\Doctrine\Repository\ProductRepository;

class ProductDIResolver
{
	private $resolver;

	public function __construct(DIResolver $resolver)
	{
		$this->resolver = $resolver::getContainer();
	}

	public function resolve()
	{
		$this->resolver->set(
			ProductDaoFactoryInterface::class,
			$this->resolver->get(ProductDaoFactory::class)
		);

		$this->resolver->set(
			ProductRepositoryInterface::class,
			$this->resolver->get(ProductRepository::class)
		);
	}
}
