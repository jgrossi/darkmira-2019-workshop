<?php

declare(strict_types=1);

namespace Acme\Domain;

use Acme\Domain\Entity\Rate;
use Acme\Infra\RateRepository;
use Acme\Infra\TalkRepository;
use Acme\Infra\UserRepository;

class RateTalkHandler
{
    private $talkRepository;
    private $userRepository;
    private $rateRepository;

    public function __construct(
        TalkRepository $talkRepository,
        UserRepository $userRepository,
        RateRepository $rateRepository
    ) {
        $this->talkRepository = $talkRepository;
        $this->userRepository = $userRepository;
        $this->rateRepository = $rateRepository;
    }

    public function handle(RateTalkCommand $command): Rate
    {
        $talk = $this->talkRepository->findById($command->getTalkId());
        $user = $this->userRepository->findById($command->getUserId());

        $rate = new Rate();
        $rate->setTalk($talk);
        $rate->setUser($user);
        $rate->setGrade($command->getGrade());

        return $this->rateRepository->create($rate);
    }
}
