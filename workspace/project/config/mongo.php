<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Project\Persistance\Doctrine\Db\MongoConnection;

$vendor_loader->add('Documents', __DIR__);

AnnotationRegistry::registerLoader([$vendor_loader, 'loadClass']);

$container->set(MongoConnection::class, function()
{
    $host = 'dev-mongo';
    $port = '27017';
    $database = 'graphql';

    $connection = new Connection('mongodb://' . $host . ':' . $port);
    $config = new Configuration();
    $config->setProxyDir(__DIR__ . '/Proxies');
    $config->setProxyNamespace('Proxies');
    $config->setHydratorDir(__DIR__ . '/Hydrators');
    $config->setHydratorNamespace('Hydrators');
    $config->setDefaultDB($database);
    $config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '../Project/Persistance/Doctrine'));

    $documentManager = DocumentManager::create($connection, $config);

    $mongoConnection = new MongoConnection($documentManager);
    return $mongoConnection;
});
