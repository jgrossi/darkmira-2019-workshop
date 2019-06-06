<?php

declare(strict_types=1);

namespace Acme\Infra;

interface RepositoryInterface
{
    public function findById(int $id);
}
