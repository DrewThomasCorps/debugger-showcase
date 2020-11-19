<?php
/**
 * Created by PhpStorm.
 * User: Drew
 * Date: 2019-09-26
 * Time: 10:22
 */
global $app;

$app->get('/hello', "ExampleController::sayHello")->add(new ExampleMiddleware());
$app->get('/directory', DirectoryTraverserController::class . ":traverse");
