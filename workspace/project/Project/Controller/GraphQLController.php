<?php

namespace Project\Controller;

use GraphQL\Error\Debug;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Type\SchemaConfig;
use GraphQL\Server\StandardServer;
use GraphQL\Server\ServerConfig;
use Project\DependencyInjection\DIResolver;
use Project\GraphQL\Mutation;
use Project\GraphQL\Query;
use Project\Product\DIResolver\ProductDIResolver;
use Project\Product\Service\SaveProductService;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class GraphQLController
{
	/**
	* 
	*
	* @param  \Psr\Http\Message\ServerRequestInterface $req  PSR7 request
	* @param  \Psr\Http\Message\ResponseInterface      $res  PSR7 response
	* @param  array                                    $args Route parameters
	*
	* @return \Psr\Http\Message\ResponseInterface
	*/
	public function getGraphQL(Request $request, Response $response, $args = [])
	{
		$result = 'Hello from /graphql/ on http get';

		$response->getBody()->write($result);
	}

	/**
	* 
	*
	* @param  \Psr\Http\Message\ServerRequestInterface $req  PSR7 request
	* @param  \Psr\Http\Message\ResponseInterface      $res  PSR7 response
	* @param  array                                    $args Route parameters
	*
	* @return \Psr\Http\Message\ResponseInterface
	*/
	public function postGraphQL(Request $request, Response $response, $args = [])
	{
		$resolver = DIResolver::resolve(ProductDIResolver::class);
		$resolver->resolve();

		try {
			$query = DIResolver::resolve(Query::class);
			$mutation = DIResolver::resolve(Mutation::class);

			$schemaConfig = SchemaConfig::create()
				->setQuery($query)
				->setMutation($mutation);

			$schema = new Schema($schemaConfig);
			$debug = Debug::INCLUDE_DEBUG_MESSAGE | Debug::INCLUDE_TRACE;

			$serverConfig = ServerConfig::create()
				->setSchema($schema)
				->setDebug($debug);

			$server = new StandardServer($serverConfig);

			$result = $server->executePsrRequest($request);

			$response->getBody()->write(json_encode($result));

			return $response;

		} catch (\Exception $e) {
			var_dump($e);
			StandardServer::send500Error($e);
		}
	}
}
