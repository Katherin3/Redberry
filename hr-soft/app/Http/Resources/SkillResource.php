<?php

namespace App\Http\Resources;

use App\Models\Candidate;
use App\Models\Skill;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    public function __construct(Skill $resource)
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
