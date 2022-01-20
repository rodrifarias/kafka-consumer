<?php

use DI\ContainerBuilder;
use longlang\phpkafka\Consumer\ConsumerConfig;
use Rodrifarias\Kafka\App\MyTopic\Consumer\MyTopicConsumer;
use Rodrifarias\Kafka\Infra\Environment;

$consumerConfigClosure = function (Environment $env): ConsumerConfig {
    $config = new ConsumerConfig();
    $config->setBroker($env->config->kafkaConfig->brokers);
    $config->setGroupId($env->config->kafkaConfig->groupId);
    $config->setClientId($env->config->kafkaConfig->groupId);
    $config->setGroupInstanceId($env->config->kafkaConfig->groupId);
    $config->setInterval(0.5);

    return $config;
};

$exportDataConsumerClosure = function (ConsumerConfig $config, Environment $env): MyTopicConsumer {
    $consumerConfig = clone $config;
    $consumerConfig->setTopic($env->config->kafkaConfig->topic);

    return new MyTopicConsumer($consumerConfig);
};

$container = new ContainerBuilder();

$container->addDefinitions([
    Environment::class => fn () => Environment::getInstance(),
    ConsumerConfig::class => $consumerConfigClosure,
    MyTopicConsumer::class => $exportDataConsumerClosure,
]);

return $container->build();