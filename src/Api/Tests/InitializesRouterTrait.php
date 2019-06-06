<?php

declare(strict_types=1);

namespace Acme\Api\Tests;

use Acme\Api\Container;
use League\Route\Router;

trait InitializesRouterTrait
{
    /** @var \League\Container\Container */
    protected $container;

    /** @var Router */
    protected $router;

    public function setUp(): void
    {
        $this->container = Container::refresh();

        $application = new \Acme\Api\Application();
        $this->router = $application->getRouter();
    }
}
