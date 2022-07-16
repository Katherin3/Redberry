<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class UpdateCandidatesDTO extends DataTransferObject
{
    public array $filter = [];

    public function getValues(): array
    {
        $data = [];
        foreach ($this->toArray() as $key => $value) {
            $data[$key] = $value;
        }

        return $data;
    }
}
