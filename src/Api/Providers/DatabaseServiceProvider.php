<?php

declare(strict_types=1);

namespace Acme\Api\Providers;

use Illuminate\Database\Capsule\Manager;
use League\Container\ServiceProvider\AbstractServiceProvider;

class DatabaseServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        Manager::class,
    ];

    public function register(): void
    {
        $this->getContainer()->add(
            Manager::class, $this->initializeDatabase()
        );
    }

    private function initializeDatabase(): Manager
    {
        $manager = new Manager();
        $manager->addConnection(
            [
                'driver' => 'mysql',
                'host' => 'localhost',
                'database' => env('DB_NAME'),
                'username' => env('DB_USER'),
                'password' => env('DB_PASSWORD'),
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ]
        );

        return $manager;
    }
}
