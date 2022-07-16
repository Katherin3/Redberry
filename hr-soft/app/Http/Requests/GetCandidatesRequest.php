<?php

namespace App\Http\Requests;

use App\DataTransferObjects\GetCandidatesDTO;
use Illuminate\Foundation\Http\FormRequest;

class GetCandidatesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'filter.status' => 'nullable|array',
        ];
    }

    public function getDto(): GetCandidatesDTO
    {
        return new GetCandidatesDTO($this->validated());
    }
}
