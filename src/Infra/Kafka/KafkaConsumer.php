<?php

namespace Rodrifarias\Kafka\Infra\Kafka;

use longlang\phpkafka\Consumer\Consumer;

class KafkaConsumer extends Consumer
{
    public function setConsumeCallback(?callable $consumeCallback): void
    {
        $this->consumeCallback = $consumeCallback;
    }
}
