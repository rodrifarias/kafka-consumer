<?php

namespace Rodrifarias\Kafka\Infra\Kafka;

use longlang\phpkafka\Producer\Producer;
use longlang\phpkafka\Producer\ProducerConfig;

class KafkaProducerFactory
{
    public static function create(array $brokers): Producer
    {
        $producerConfig = new ProducerConfig();
        $producerConfig->setBootstrapServer($brokers);
        $producerConfig->setBrokers($brokers);

        return new Producer($producerConfig);
    }
}

