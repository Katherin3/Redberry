<?php

namespace App\Http\Requests;

use App\DataTransferObjects\ShowCandidatesDTO;
use Illuminate\Foundation\Http\FormRequest;

class ShowCandidateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:candidates,id',
        ];
    }

    public function getDto(): ShowCandidatesDTO
    {
        return new ShowCandidatesDTO($this->validated());
    }
}
