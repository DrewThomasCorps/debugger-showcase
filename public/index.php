<?php
/**
 * Created by PhpStorm.
 * User: Drew
 * Date: 2019-09-26
 * Time: 09:56
 */

use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;

$displayErrorDetails = false;
//ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../resources/error-handlers/HttpErrorHandler.php';
require_once __DIR__ . '/../resources/error-handlers/ShutdownHandler.php';
require_once __DIR__ . '/../resources/JsonBodyParserMiddleware.php';

$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();
$responseFactory = $app->getResponseFactory();

$pathToPublic = str_replace($_SERVER['DOCUMENT_ROOT'], '',__DIR__);
$app->setBasePath($pathToPublic);

$app->add(JsonBodyParserMiddleware::class);

$serverRequestCreator = ServerRequestCreatorFactory::create();
$request = $serverRequestCreator->createServerRequestFromGlobals();

$errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);
$shutdownHandler = new ShutdownHandler($request, $errorHandler, $displayErrorDetails);
register_shutdown_function($shutdownHandler);

$errorMiddleware = $app->addErrorMiddleware(true, false, false);
$errorMiddleware->setDefaultErrorHandler($errorHandler);

function srcAutoloader($className)
{
    $directoriesInSrc = scandir("../src");
    foreach ($directoriesInSrc as $directory) {
        $possiblePath = __DIR__ . "/../src/$directory/$className.php";
        if (file_exists("$possiblePath")) {
            require_once "$possiblePath";
            break;
        }
    }
}

spl_autoload_register("srcAutoloader");

$directoriesToIncludeInSrc = [
    "config",
    "routes",
];
foreach ($directoriesToIncludeInSrc as $directory) {
    $files = scandir("../src/$directory");
    foreach ($files as $file) {
        if (!is_dir($file) && (strpos($file, ".php") === strlen($file) - 4)) {
            include_once __DIR__ . "/../src/$directory/$file";
        }
    }
}

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->run();
