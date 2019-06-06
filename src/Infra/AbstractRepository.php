<?php

declare(strict_types=1);

namespace Acme\Infra;

use Acme\Domain\Entity\EntityInterface;
use Illuminate\Database\Capsule\Manager;

abstract class AbstractRepository
{
    protected $dbManager;

    public function __construct(Manager $dbManager)
    {
        $this->dbManager = $dbManager->getDatabaseManager();
    }
}