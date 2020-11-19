<?php

use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * Created by PhpStorm.
 * User: Drew
 * Date: 2019-09-26
 * Time: 10:43
 */
class ExampleController
{
    public static function sayHello(Request $request, Response $response, $args)
    {
        $name = Example::getName();
        $response->getBody()->write("Hello $name, you're awesome");
        return $response;
    }

}