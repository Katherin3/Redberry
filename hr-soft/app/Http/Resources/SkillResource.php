<?php

namespace App\Http\Resources;

use App\Models\Candidate;
use App\Models\Skill;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class SkillResource extends JsonResource
{
    public function __construct(Skill|MissingValue $resource)
    {
        $this->resource = $resource;
    }

    public function toArray($request): array
    {
        return [
            'id'   => $this->resource->getId(),
            'name'   => $this->resource->getName(),
        ];
    }
}
