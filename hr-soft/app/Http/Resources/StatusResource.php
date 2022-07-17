<?php

namespace App\Http\Resources;

use App\Models\Candidate;
use App\Models\Skill;
use App\Models\Status;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusResource extends JsonResource
{
    public function __construct(Status $resource)
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
