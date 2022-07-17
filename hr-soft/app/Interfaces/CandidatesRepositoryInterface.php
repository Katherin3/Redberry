<?php

namespace App\Interfaces;

use App\DataTransferObjects\CreateCandidatesDTO;
use App\DataTransferObjects\CreateCandidateStatusDTO;
use App\DataTransferObjects\GetCandidatesDTO;
use App\DataTransferObjects\UpdateCandidatesDTO;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Collection;

interface CandidatesRepositoryInterface
{
    public function find(int $id): ?Candidate;

    public function findMany(GetCandidatesDTO $dto): Collection;

    public function create(CreateCandidatesDTO $dto): Candidate;

    public function update(Candidate $candidate, UpdateCandidatesDTO $dto): Candidate;

    public function changeStatus(Candidate $candidate, CreateCandidateStatusDTO $dto): Candidate;
}
