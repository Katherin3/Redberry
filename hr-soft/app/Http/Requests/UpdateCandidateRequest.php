<?php

namespace App\Http\Requests;

use App\DataTransferObjects\UpdateCandidatesDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:candidates,id',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'position' => 'required|string',
            'minSalary' => 'nullable|integer|max:1000000|lt:maxSalary',
            'maxSalary' => 'nullable|integer|max:1000000|gt:minSalary',
            'skillIds' => 'nullable|array',
            'linkedinUrl' => 'nullable|string',
            'files'     => 'nullable|array|max:20',
            'files.*'   => [
                'required',
                'file',
                'max:2048',
            ],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge($this->route()->parameters());
    }

    public function getDto(): UpdateCandidatesDTO
    {
        return new UpdateCandidatesDTO($this->validated());
    }
}
