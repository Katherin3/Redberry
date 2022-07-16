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

    public function getDto(): UpdateCandidatesDTO
    {
        return new UpdateCandidatesDTO($this->validated());
    }
}
