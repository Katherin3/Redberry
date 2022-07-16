<?php

namespace App\DataTransferObjects;

use Illuminate\Support\Str;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class GetCandidatesDTO extends DataTransferObject
{
    public array $filter = [];

    public function getValues(): array
    {
        $data = [];
        foreach ($this->toArray() as $key => $value) {
            $data[Str::snake($key)] = $value;
        }

        return $data;
    }
}
