<?php

declare(strict_types=1);

namespace Acme\Api;

use League\Container\Container as BaseContainer;

final class Container
{
    /** @var BaseContainer */
    private static $container;

    private function __construct()
    {
        static::$container = new BaseContainer();
    }

    public static function instance(): BaseContainer
    {
        if (!static::$container) {
            new static();
        }

        return static::$container;
    }
}
