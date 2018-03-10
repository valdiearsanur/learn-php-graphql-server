<?php

class MyApp extends \DI\Bridge\Slim\App
{
	protected function configureContainer(DI\ContainerBuilder $builder)
	{
		$definitions['settings.displayErrorDetails'] = true;
		$definitions['settings.addContentLengthHeader'] = false;

		$builder->addDefinitions($definitions);
	}
}
