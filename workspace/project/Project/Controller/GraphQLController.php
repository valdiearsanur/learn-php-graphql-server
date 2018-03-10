<?php

namespace Project\Controller;

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
		$result = 'Hello from /graphql/ on http post';

		$response->getBody()->write($result);
	}
}
