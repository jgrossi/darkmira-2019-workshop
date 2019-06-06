<?php

namespace Acme\Tests\Domain;

use Acme\Api\Tests\TestCase;
use Acme\Domain\Entity\Rate;
use Acme\Domain\Entity\Talk;
use Acme\Domain\Entity\User;
use Acme\Domain\RateTalkCommand;
use Acme\Domain\RateTalkHandler;
use Acme\Infra\RateRepository;
use Acme\Infra\TalkRepository;
use Acme\Infra\UserRepository;

final class RateTalkHandlerTest extends TestCase
{
    public function test_rates_the_talk_and_return_the_rate_entity(): void
    {
        $this->mockTalkRepository();
        $this->mockUserRepository();
        $this->mockRateRepository();

        /** @var RateTalkHandler $handler */
        $handler = $this->container->get(RateTalkHandler::class);
        $rate = $handler->handle(new RateTalkCommand(1, 2, 3));

        $this->assertInstanceOf(Rate::class, $rate);
        $this->assertEquals(1, $rate->getId());
        $this->assertEquals('Junior', $rate->getUser()->getName());
    }

    private function mockTalkRepository(): void
    {
        $mock = \Mockery::mock(TalkRepository::class);
        $mock->shouldReceive('findById')->andReturn($this->makeTalk());

        $this->container->add(TalkRepository::class, $mock);
    }

    private function makeTalk(): Talk
    {
        $talk = new Talk();
        $talk->setId(1);
        $talk->setTitle('Foo');
        $talk->setDescription('Foo description');

        return $talk;
    }

    private function mockUserRepository(): void
    {
        $mock = \Mockery::mock(UserRepository::class);
        $mock->shouldReceive('findById')->andReturn($this->makeUser());

        $this->container->add(UserRepository::class, $mock);
    }

    private function makeUser(): User
    {
        $user = new User();
        $user->setId(1);
        $user->setName('Junior');
        $user->setEmail('junior@example.com');

        return $user;
    }

    private function mockRateRepository(): void
    {
        $mock = \Mockery::mock(RateRepository::class);
        $mock->shouldReceive('create')->andReturn($this->makeRate());

        $this->container->add(RateRepository::class, $mock);
    }

    private function makeRate(): Rate
    {
        $rate = new Rate();
        $rate->setId(1);
        $rate->setGrade(3);
        $rate->setUser($this->makeUser());
        $rate->setTalk($this->makeTalk());

        return $rate;
    }
}
