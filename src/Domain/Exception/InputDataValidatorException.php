<?php

namespace Rodrifarias\Kafka\Domain\Exception;

use InvalidArgumentException;

class InputDataValidatorException extends InvalidArgumentException
{
    public function __construct(array $errors)
    {
        $errors = array_map(fn ($e) => implode(', ', $e), $errors);
        $messages = array_unique($errors);

        parent::__construct(implode(', ', $messages));
    }
}
