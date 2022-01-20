<?php

namespace Rodrifarias\Kafka\App\MyTopic\Command;

use Exception;
use longlang\phpkafka\Consumer\ConsumeMessage;
use Rodrifarias\Kafka\App\MyTopic\Consumer\MyTopicConsumer;
use Rodrifarias\Kafka\Domain\UseCase\MyTopic\Data\MyTopicDataInput;
use Rodrifarias\Kafka\Domain\UseCase\MyTopic\MyTopicUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class KafkaConsumerCommand extends Command
{
    public function __construct(private MyTopicConsumer $consumer, private MyTopicUseCase $myTopicUseCase)
    {
        parent::__construct('app:kafkaMyTopicConsumer');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Starting reading kafka topic [' . implode(' ', $this->consumer->getConfig()->getTopic()) . ']');
        $this->consumer->setConsumeCallback($this->consumeCallback($output));
        $this->consumer->start();
        return self::SUCCESS;
    }

    private function consumeCallback(OutputInterface $output): Callable
    {
        return function (ConsumeMessage $message) use ($output) {
            try {
                $value = json_decode($message->getValue(), true);
                $dataInput = MyTopicDataInput::create($value);
                $this->myTopicUseCase->execute($dataInput);
            } catch (Exception $e) {
                $output->writeln("Error reading the topic [{$message->getTopic()}] key [{$message->getKey()}] Message [{$e->getMessage()}]");
            }
        };
    }
}
