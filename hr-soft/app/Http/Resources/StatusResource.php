<?php

namespace App\Http\Resources;

use App\Models\Candidate;
use App\Models\Skill;
use App\Models\Status;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class StatusResource extends JsonResource
{
    public function __construct(Status|MissingValue $resource)
    {
        $this->resource = $resource;
    }

    public function toArray($request): array
    {
        return [
            'id'   => $this->resource->getId(),
            'name'   => $this->resource->getName(),
            'comment' => $this->resource->pivot->comment,
            'createdAt' =>$this->resource->getCreatedAt(),
        ];
    }
}
