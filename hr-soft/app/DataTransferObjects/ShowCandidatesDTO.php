<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class ShowCandidatesDTO extends DataTransferObject
{
    public int $id;

    public function getValues(): array
    {
        $data = [];
        foreach ($this->toArray() as $key => $value) {
            $data[$key] = $value;
        }

        return $data;
    }
}
