<?php

namespace App\Http\Requests;

use App\DataTransferObjects\GetCandidatesDTO;
use Illuminate\Foundation\Http\FormRequest;

class GetCandidatesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'filter' => 'nullable|array',
            'filter.status' => 'nullable|string',
        ];
    }

    public function getDto(): GetCandidatesDTO
    {
        return new GetCandidatesDTO($this->validated());
    }
}
