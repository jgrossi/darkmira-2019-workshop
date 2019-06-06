<?php

namespace Acme\Tests\Api\Http;

use Acme\Api\Tests\MakesHttpRequestsTrait;
use Acme\Api\Tests\TestCase;
use Acme\Domain\Entity\Rate;
use Acme\Domain\RateTalkHandler;

final class RateTalkActionTest extends TestCase
{
    use MakesHttpRequestsTrait;

    public function test_it_returns_the_rate_id(): void
    {
        $this->mockHandler();

        $response = $this->call('POST', '/talks/1/rate', [
            'userId' => 2,
            'grade' => 3,
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals(10, $data['rateId']);
    }

    private function mockHandler(): void
    {
        $rate = new Rate();
        $rate->setId(10);

        $mock = \Mockery::mock(RateTalkHandler::class);
        $mock->shouldReceive('handle')->andReturn($rate);

        $this->container->add(RateTalkHandler::class, $mock);
    }
}
