<?php

namespace App\Http\Resources;

use App\Models\Candidate;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
{
    public function __construct(Candidate $resource)
    {
        $this->resource = $resource;
    }

    public function toArray($request): array
    {
        return [
            'id'   => $this->resource->getId(),
            'firstName' => $this->resource->getFirstName(),
            'lastName' => $this->resource->getLastName(),
            'position' => $this->resource->getPosition(),
            'minSalary' => $this->resource->getMinSalary(),
            'maxSalary' => $this->resource->getMaxSalary(),
            'linkedinUrl' => $this->resource->getLinkedinUrl(),
            'skills' => SkillResource::collection($this->whenLoaded('skill')),
            'status' => StatusResource::collection($this->whenLoaded('status')),
            'files' => $this->resource->files,
        ];
    }
}
