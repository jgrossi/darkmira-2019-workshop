<?php

declare(strict_types=1);

namespace Acme\Api\Tests;

use League\Route\Router;

trait InitializesRouterTrait
{
    /** @var Router */
    protected $router;

    public function setUp(): void
    {
        if (!$this->router) {
            $this->router = require __DIR__.'/../../../config/routes.php';
        }

        parent::setUp();
    }
}
