<?php

namespace Rodrifarias\Kafka\Test\Unit\UseCase\MyTopic;

use PHPUnit\Framework\TestCase;
use Rodrifarias\Kafka\Domain\Exception\InputDataValidatorException;
use Rodrifarias\Kafka\Domain\UseCase\MyTopic\Data\MyTopicDataInput;

class MyTopicDataInputTest extends TestCase
{
    public function testShouldGenerateInputDataValidatorExceptionWhenParamIsEmptyArray(): void
    {
        $this->expectException(InputDataValidatorException::class);
        $this->expectExceptionMessage('Id is required, Name is required');
        MyTopicDataInput::create([]);
    }

    public function testShouldGenerateInputDataValidatorExceptionWhenParamWithoutId(): void
    {
        $this->expectException(InputDataValidatorException::class);
        $this->expectExceptionMessage('Id is required');
        MyTopicDataInput::create(['name' => 'Rodrigo Farias']);
    }

    public function testShouldGenerateInputDataValidatorExceptionWhenParamWithoutName(): void
    {
        $this->expectException(InputDataValidatorException::class);
        $this->expectExceptionMessage('Name is required');
        MyTopicDataInput::create(['id' => 'abc-123']);
    }

    public function testShouldBeMyTopicDataInputInstance(): void
    {
        $dataInput = MyTopicDataInput::create(['id' => 'abc-123', 'name' => 'Rodrigo Farias']);
        $this->assertInstanceOf(MyTopicDataInput::class, $dataInput);
    }
}