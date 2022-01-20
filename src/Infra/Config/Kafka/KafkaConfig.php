<?php

namespace Rodrifarias\Kafka\Infra\Config\Kafka;

class KafkaConfig
{
    public function __construct(
        public readonly string $groupId,
        public readonly array $brokers,
        public readonly string $topic
    ) {
    }
}
