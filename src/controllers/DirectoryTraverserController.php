<?php
/**
 * Created by PhpStorm.
 * User: Drew
 * Date: 11/19/20
 * Time: 12:55
 */

use Slim\Psr7\Request;
use Slim\Psr7\Response;



class DirectoryTraverserController
{
    public static function traverse(Request $request, Response $response, $args)
    {
        $directoryTraverser = new DirectoryTraverser(__DIR__ . "/../../..");
        $directoryTraverser->echoHtml();
        return $response;
    }

}
