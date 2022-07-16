<?php

namespace App\Repositories;

use App\DataTransferObjects\CreateCandidatesDTO;
use App\DataTransferObjects\GetCandidatesDTO;
use App\DataTransferObjects\UpdateCandidatesDTO;
use App\Interfaces\CandidatesRepositoryInterface;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Collection;

class CandidatesRepository implements CandidatesRepositoryInterface
{
    public function find(int $id): ?Candidate
    {
        //
    }

    public function findMany(GetCandidatesDTO $dto): Collection
    {
        return Candidate::all();
    }

    public function create(CreateCandidatesDTO $dto): Candidate
    {
        //
    }

    public function update(Candidate $candidate, UpdateCandidatesDTO $dto): Candidate
    {
        //
    }
}
