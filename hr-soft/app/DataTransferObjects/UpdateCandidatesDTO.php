<?php

namespace App\DataTransferObjects;

use Illuminate\Support\Str;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class UpdateCandidatesDTO extends DataTransferObject
{
    public int $id;

    public string $firstName;

    public string $lastName;

    public string $position;

    public ?int $minSalary;

    public ?int $maxSalary;

    public ?array $skillIds = [];

    public ?string $linkedinUrl;

    public ?array $files;

    public function getValues(): array
    {
        $data = [];
        foreach ($this->toArray() as $key => $value) {
            $data[Str::snake($key)] = $value;
        }

        return $data;
    }
}
