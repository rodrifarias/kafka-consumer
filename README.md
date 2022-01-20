# PHP Kafka Consumer

Projeto para consumo de mensageria com Kafka utilizando PHP

### Pré-Requisitos
* PHP 8.1
* Docker
* Composer

### Instalação de Dependências
``composer install``

### Criação do container para rodar o kafka

``composer karfka:start``

### Iniciando o consumer
``composer consumer:start``

### Criação de mensagens na fila
``composer producer:create-messages``

### Testes
``composer test``
