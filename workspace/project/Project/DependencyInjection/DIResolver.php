<?php
namespace Project\DependencyInjection;

use DI\Container;

class DIResolver
{
	private static $container;
	
	public static function has($name)
	{
		$result = static::getContainer()->has($name);
		return $result;
	}

	public static function resolve($name)
	{
		$class = static::getContainer()->get($name);
		return $class;
	}

	public static function resolveNewInstance($name)
	{
		$class = static::getContainer()->make($name);
		return $class;
	}

	public static function getContainer()
	{
		if (static::$container === null) {
			global $container;
			static::$container = $container;
		}
		return static::$container;
	}
}
