<?php

declare(strict_types=1);

namespace Acme\Domain;

final class RateTalkCommand
{
    private $talkId;
    private $userId;
    private $grade;

    public function __construct(int $talkId, int $userId, int $grade)
    {
        $this->talkId = $talkId;
        $this->userId = $userId;
        $this->grade = $grade;
    }

    public function getTalkId(): int
    {
        return $this->talkId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getGrade(): int
    {
        return $this->grade;
    }
}
