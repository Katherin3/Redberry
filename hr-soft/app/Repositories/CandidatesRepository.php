<?php

namespace App\Repositories;

use App\DataTransferObjects\CreateCandidatesDTO;
use App\DataTransferObjects\GetCandidatesDTO;
use App\DataTransferObjects\UpdateCandidatesDTO;
use App\Interfaces\CandidatesRepositoryInterface;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\QueryBuilder;

class CandidatesRepository implements CandidatesRepositoryInterface
{
    public function find(int $id): ?Candidate
    {
        $candidate =  QueryBuilder::for($this->getModel())->find($id);

        $candidate->load('skills', 'statuses');

        return $candidate;
    }

    public function findMany(GetCandidatesDTO $dto): Collection
    {
        $candidates = QueryBuilder::for($this->getModel())->get();

        $candidates->load('skills', 'statuses');

        return $candidates;
    }

    public function create(CreateCandidatesDTO $dto): Candidate
    {
        $candidate = QueryBuilder::for($this->getModel())->create($dto->getValues());

        $candidate->load('skills', 'statuses');

        return $candidate;
    }

    public function update(Candidate $candidate, UpdateCandidatesDTO $dto): Candidate
    {
        $candidate->update($dto->getValues());

        $candidate->load('skills', 'statuses');

        return $candidate;
    }

    public function getModel(): Candidate
    {
        return new Candidate();
    }
}
