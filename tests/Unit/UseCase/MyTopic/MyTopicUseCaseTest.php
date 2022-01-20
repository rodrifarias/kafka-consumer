<?php

namespace Rodrifarias\Kafka\Test\Unit\UseCase\MyTopic;

use PHPUnit\Framework\TestCase;
use Rodrifarias\Kafka\Domain\UseCase\MyTopic\Data\MyTopicDataInput;
use Rodrifarias\Kafka\Domain\UseCase\MyTopic\MyTopicUseCase;

class MyTopicUseCaseTest extends TestCase
{
    public function testMustHaveOutputStringValid(): void
    {
        $myTopicUseCase = new MyTopicUseCase();
        $myTopicUseCase->execute(MyTopicDataInput::create(['id' => 'abc-123', 'name' => 'Rodrigo Farias']));
        $this->expectOutputString('ID: abc-123' . PHP_EOL . 'NAME: Rodrigo Farias' . PHP_EOL);
    }
}