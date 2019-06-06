<?php

declare(strict_types=1);

namespace Acme\Infra;

use Acme\Domain\Entity\EntityInterface;

final class EntityHydrator
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function hydrate(EntityInterface $entity): EntityInterface
    {
        foreach ($this->data as $field => $value) {
            $methodName = 'set' . ucfirst($field);
            if (method_exists($entity, $methodName)) {
                call_user_func([$entity, $methodName], $value);
            }
        }

        return $entity;
    }
}
