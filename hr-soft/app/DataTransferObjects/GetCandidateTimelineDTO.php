<?php

namespace App\DataTransferObjects;

use Illuminate\Support\Str;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class GetCandidateTimelineDTO extends DataTransferObject
{
    public int $id;

    public function getValues(): array
    {
        $data = [];
        foreach ($this->toArray() as $key => $value) {
            $data[Str::snake($key)] = $value;
        }

        return $data;
    }
}
