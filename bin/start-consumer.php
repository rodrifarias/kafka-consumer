<?php

require __DIR__ . '/../bootstrap.php';

use Symfony\Component\Console\Application;
use Rodrifarias\Kafka\App\MyTopic\Command\KafkaConsumerCommand;
use Rodrifarias\Kafka\Domain\Exception\InputDataValidatorException;

$container = require __DIR__ . '/../config/container.php';

$commands = [
    $container->get(KafkaConsumerCommand::class),
];

try {
    $app = new Application('Consumer App');
    $app->addCommands($commands);
    $app->run();
} catch (Exception|InputDataValidatorException $e) {
    throw new Exception('Error when execute consumer ' . $e->getMessage());
}
