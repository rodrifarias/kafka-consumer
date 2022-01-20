<?php

namespace Rodrifarias\Kafka\Domain\UseCase\MyTopic;

use Rodrifarias\Kafka\Domain\UseCase\MyTopic\Data\MyTopicDataInput;

class MyTopicUseCase
{
    public function execute(MyTopicDataInput $dataInput): void
    {
        echo 'ID: ' . $dataInput->id . PHP_EOL . 'NAME: ' . $dataInput->name . PHP_EOL;
    }
}
