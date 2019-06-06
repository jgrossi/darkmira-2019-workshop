<?php

declare(strict_types=1);

namespace Acme\Domain\Entity;

class Rate implements EntityInterface
{
    private $id;
    private $talk;
    private $user;
    private $grade;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTalk(): Talk
    {
        return $this->talk;
    }

    public function setTalk(Talk $talk): void
    {
        $this->talk = $talk;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getGrade(): int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): void
    {
        $this->grade = $grade;
    }
}
