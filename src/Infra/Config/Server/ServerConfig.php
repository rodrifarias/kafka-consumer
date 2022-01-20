<?php

namespace Rodrifarias\Kafka\Infra\Config\Server;

use Rodrifarias\Kafka\Infra\Config\Kafka\KafkaConfig;

class ServerConfig extends AbstractServerConfig
{
    public readonly KafkaConfig $kafkaConfig;

    public function __construct(array $config)
    {
        $kafka = $config['kafka'];
        $this->kafkaConfig = new KafkaConfig($kafka['groupId'], $kafka['brokers'], $kafka['topic']);
    }
}
