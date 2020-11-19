<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

/**
 * Created by PhpStorm.
 * User: Drew
 * Date: 2019-10-28
 * Time: 15:19
 */

class ExampleMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $response = $handler->handle($request);
        $response->getBody()->write(" after middleware");
        return $response;
    }
}