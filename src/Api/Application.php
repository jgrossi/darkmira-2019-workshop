<?php

declare(strict_types=1);

namespace Acme\Api;

use Acme\Api\Providers\DatabaseServiceProvider;
use League\Container\ReflectionContainer;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;

class Application
{
    private $router;

    public function __construct()
    {
        $this->initializeRouter();
    }

    private function initializeRouter(): void
    {
        $container = Container::instance();
        $container->delegate(new ReflectionContainer());
        $container->addServiceProvider(new DatabaseServiceProvider());

        $strategy = new ApplicationStrategy();
        $strategy->setContainer($container);

        $router = new Router();
        $router->setStrategy($strategy);

        (require __DIR__.'/../../config/routes.php')($router);

        $this->router = $router;
    }

    public function getRouter(): Router
    {
        return $this->router;
    }
}
