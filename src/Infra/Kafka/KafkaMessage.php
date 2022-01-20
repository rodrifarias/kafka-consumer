<?php

namespace Rodrifarias\Kafka\Infra\Kafka;

use Stringable;

class KafkaMessage implements Stringable
{
    public function __construct(public readonly string $id, public readonly string $name)
    {
    }

    public function __toString(): string
    {
        return json_encode(get_object_vars($this));
    }
}
