<?php

namespace App\Http\Requests;

use App\DataTransferObjects\GetCandidateTimelineDTO;
use Illuminate\Foundation\Http\FormRequest;

class GetCandidateTimelineRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'candidateId' => 'required|integer|exists:candidates,id'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge($this->route()->parameters());
    }

    public function getDto(): GetCandidateTimelineDTO
    {
        return new GetCandidateTimelineDTO($this->validated());
    }
}
