<?php

namespace Acme\Tests\Domain;

use Acme\Domain\RateTalkCommand;
use PHPUnit\Framework\TestCase;

final class RateTalkCommandTest extends TestCase
{
    public function test_it_returns_all_the_data(): void
    {
        $command = new RateTalkCommand(1, 2, 3);

        $this->assertEquals(1, $command->getTalkId());
        $this->assertEquals(2, $command->getUserId());
        $this->assertEquals(3, $command->getGrade());
    }    
}
