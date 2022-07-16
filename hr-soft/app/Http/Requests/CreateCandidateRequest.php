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
            'minSalary' => 'nullable|integer|min:100',
            'maxSalary' => 'nullable|integer|max:10000',
            'skills' => 'nullable|array',
            'linkedinUrl' => 'nullable|string',
            'cv' => [
                'nullable',
                'file',
                'mimetypes: application/pdf',
                'max: 100000',
            ]
        ];
    }

    public function getDto(): CreateCandidatesDTO
    {
        return new CreateCandidatesDTO($this->validated());
    }
}
