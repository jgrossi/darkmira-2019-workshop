<?php

declare(strict_types=1);

namespace Acme\Infra;

use Acme\Domain\Entity\Rate;

class RateRepository extends AbstractRepository implements RepositoryInterface
{
    private const TABLE_NAME = 'rates';

    public function findById(int $id): Rate
    {
        $model = $this->dbManager
            ->table(static::TABLE_NAME)
            ->find($id);

        $hydrator = new EntityHydrator((array)$model);

        return $hydrator->hydrate(new Rate());
    }

    public function create(Rate $rate): Rate
    {
        $id = $this->dbManager
            ->table(static::TABLE_NAME)
            ->insertGetId(
                [
                    'talk_id' => $rate->getTalk()->getId(),
                    'user_id' => $rate->getUser()->getId(),
                    'grade' => $rate->getGrade(),
                ]
            );

        $rate->setId($id);

        return $rate;
    }
}
