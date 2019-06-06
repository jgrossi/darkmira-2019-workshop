<?php

declare(strict_types=1);

namespace Acme\Infra;

use Acme\Domain\Entity\EntityInterface;
use Acme\Domain\Entity\Talk;

final class TalkRepository extends AbstractRepository
{
    private const TABLE_NAME = 'talks';

    /**
     * @param int $talkId
     * @return Talk|EntityInterface
     */
    public function findById(int $talkId): Talk
    {
        $model = $this->dbManager
            ->table(static::TABLE_NAME)
            ->find($talkId);

        $hydrator = new EntityHydrator((array)$model);

        return $hydrator->hydrate(new Talk());
    }
}
