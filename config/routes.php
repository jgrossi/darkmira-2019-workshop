<?php

use League\Route\Router;

return function (Router $router) {
    $router->get('/', \Acme\Api\Http\HomeAction::class);
    $router->post('/talks/{talkId}/rate', \Acme\Api\Http\RateTalkAction::class);
};
