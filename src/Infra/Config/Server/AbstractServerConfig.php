<?php

namespace Rodrifarias\Kafka\Infra\Config\Server;

use Rodrifarias\Kafka\Infra\Config\Kafka\KafkaConfig;

abstract class AbstractServerConfig
{
    public readonly KafkaConfig $kafkaConfig;
}
