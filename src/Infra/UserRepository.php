<?php

declare(strict_types=1);

namespace Acme\Infra;

use Acme\Domain\Entity\User;

class UserRepository extends AbstractRepository implements RepositoryInterface
{
    private const TABLE_NAME = 'users';

    public function findById(int $userId): User
    {
        $model = $this->dbManager
            ->table(static::TABLE_NAME)
            ->find($userId);

        $hydrator = new EntityHydrator((array)$model);

        return $hydrator->hydrate(new User());
    }
}
