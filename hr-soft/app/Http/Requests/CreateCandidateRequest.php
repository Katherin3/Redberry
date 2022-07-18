<?php

namespace App\Http\Requests;

use App\DataTransferObjects\CreateCandidatesDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateCandidateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'position' => 'required|string',
            'minSalary' => 'nullable|integer|max:1000000|lt:maxSalary',
            'maxSalary' => 'nullable|integer|max:1000000|gt:minSalary',
            'skillIds' => 'nullable|array',
            'linkedinUrl' => 'nullable|string',
            'files'     => 'required|array|max:20',
            'files.*'   => [
                'required',
                'file',
                'max:2048',
            ],
        ];
    }

    public function getDto(): CreateCandidatesDTO
    {
        return new CreateCandidatesDTO($this->validated());
    }
}
