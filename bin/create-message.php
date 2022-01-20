<?php

require __DIR__ . '/../bootstrap.php';

use Rodrifarias\Kafka\Infra\Kafka\KafkaMessage;
use Faker\Factory;
use Rodrifarias\Kafka\Infra\Environment;
use Rodrifarias\Kafka\Infra\Kafka\KafkaProducerFactory;

try {
    $container = require __DIR__ . '/../config/container.php';
    $env = $container->get(Environment::class);
    $topic = $env->config->kafkaConfig->topic;
    $producer = KafkaProducerFactory::create($env->config->kafkaConfig->brokers);
    $faker = Factory::create();

    echo 'Inserting messages in topic [' . $topic . ']' . PHP_EOL;

    for ($i = 0; $i <= 10; $i++) {
        $message = new KafkaMessage($faker->uuid(), $faker->name());
        $producer->send($topic, $message);
        echo $message . PHP_EOL;
    }

    echo 'Insertion completed' . PHP_EOL;

} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
