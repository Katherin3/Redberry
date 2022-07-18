<?php

namespace App\Http\Requests;

use App\DataTransferObjects\CreateCandidateStatusDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateCandidateStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'candidateId' => 'required|integer|exists:candidates,id',
            'statusId' => 'required|integer|exists:statuses,id',
            'comment' => 'nullable|string'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge($this->route()->parameters());
    }

    public function getDto(): CreateCandidateStatusDTO
    {
        return new CreateCandidateStatusDTO($this->validated());
    }
}
