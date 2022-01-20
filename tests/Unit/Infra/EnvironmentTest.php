<?php

namespace Rodrifarias\Kafka\Test\Unit\Infra;

use PHPUnit\Framework\TestCase;
use Rodrifarias\Kafka\Infra\Config\Kafka\KafkaConfig;
use Rodrifarias\Kafka\Infra\Config\Server\AbstractServerConfig;
use Rodrifarias\Kafka\Infra\Environment;

class EnvironmentTest extends TestCase
{
    public function testShouldBeEnvironmentInstance(): void
    {
        $this->assertInstanceOf(Environment::class, Environment::getInstance());
    }

    public function testMustHaveAbstractServerConfigInstance(): void
    {
        $this->assertInstanceOf(AbstractServerConfig::class, Environment::getInstance()->config);
    }

    public function testMustHaveKafkaConfigInstance(): void
    {
        $this->assertInstanceOf(KafkaConfig::class, Environment::getInstance()->config->kafkaConfig);
    }

    public function testMustHaveKafkaConfigValid(): void
    {
        $config = Environment::getInstance()->config->kafkaConfig;
        $this->assertSame('app-consumer', $config->groupId);
        $this->assertSame(['localhost:9092'], $config->brokers);
        $this->assertSame('my-topic', $config->topic);
    }
}