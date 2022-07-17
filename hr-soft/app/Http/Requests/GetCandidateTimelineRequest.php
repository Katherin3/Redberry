<?php

namespace App\Http\Requests;

use App\DataTransferObjects\GetCandidateTimelineDTO;
use Illuminate\Foundation\Http\FormRequest;

class GetCandidateTimelineRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:candidates,id'
        ];
    }

    public function getDto(): GetCandidateTimelineDTO
    {
        return new GetCandidateTimelineDTO($this->validated());
    }
}
