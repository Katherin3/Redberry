<?php

namespace App\Http\Resources;

use App\Models\CandidateStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateStatusResource extends JsonResource
{
    public function __construct(CandidateStatus $resource)
    {
        $this->resource = $resource;
    }

    public function toArray($request): array
    {
        return [
            'id'   => $this->resource->getId(),
            'comment'   => $this->resource->getComment(),
        ];
    }
}
