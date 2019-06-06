<?php

require __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();

$application = new Acme\Api\Application();
$router = $application->getRouter();

$response = $router->dispatch(
    Zend\Diactoros\ServerRequestFactory::fromGlobals()
);

(new Zend\HttpHandlerRunner\Emitter\SapiEmitter)
    ->emit($response);
