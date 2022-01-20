<?php

namespace Rodrifarias\Kafka\Domain\UseCase\MyTopic\Data;

use Rodrifarias\Kafka\Domain\Exception\InputDataValidatorException;
use Valitron\Validator;

class MyTopicDataInput
{
    private function __construct(public readonly string $id, public readonly string $name)
    {
    }

    public static function create(array $data): MyTopicDataInput
    {
        $validator = new Validator($data);
        $validator->rule('required', ['id', 'name']);

        if (!$validator->validate()) {
            throw new InputDataValidatorException($validator->errors());
        }

        return new MyTopicDataInput($data['id'], $data['name']);
    }
}
