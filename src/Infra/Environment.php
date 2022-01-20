<?php

namespace Rodrifarias\Kafka\Infra;

use Rodrifarias\Kafka\Infra\Config\Server\ServerConfig;
use Symfony\Component\Yaml\Yaml;
use Rodrifarias\Kafka\Infra\Config\Server\AbstractServerConfig;

class Environment
{
    private static ?Environment $instance = null;
    public readonly ?AbstractServerConfig $config;

    private function __construct()
    {
        $this->configServer();
    }

    private function configServer(): void
    {
        $fileConfig = Yaml::parse(file_get_contents(__DIR__ . '/../../env.yml'));
        $this->config = new ServerConfig($fileConfig);
    }

    public static function getInstance(): Environment
    {
        if (is_null(self::$instance)) {
            self::$instance = new Environment();
        }

        return self::$instance;
    }
}
