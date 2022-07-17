<?php

namespace App\Services;

use App\DataTransferObjects\CreateCandidatesDTO;
use App\DataTransferObjects\CreateCandidateStatusDTO;
use App\DataTransferObjects\GetCandidatesDTO;
use App\DataTransferObjects\ShowCandidatesDTO;
use App\DataTransferObjects\UpdateCandidatesDTO;
use App\Interfaces\CandidatesRepositoryInterface;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CandidatesService
{
    public function __construct(
        private CandidatesRepositoryInterface $repository,
    ) {
    }

    public function find(int $id): ?Candidate
    {
        return $this->repository->find($id);
    }

    public function findMany(GetCandidatesDTO $dto): Collection
    {
        return $this->repository->findMany($dto);
    }

    public function show(ShowCandidatesDTO $dto): Candidate
    {
        $item = $this->find($dto->id);
        if(empty($item)) {
            throw new ModelNotFoundException();
        }

        return $item;
    }

    public function create(CreateCandidatesDTO $dto): Candidate
    {
        return $this->repository->create($dto);
    }

    public function update(UpdateCandidatesDTO $dto): Candidate
    {
        $item = $this->find($dto->id);
        if(empty($item)) {
            throw new ModelNotFoundException();
        }

        return $this->repository->update($item, $dto);
    }

    public function changeStatus(CreateCandidateStatusDTO $dto): Candidate
    {
        $candidate = $this->find($dto->candidateId);

        if(empty($candidate)) {
            throw new ModelNotFoundException();
        }

        return $this->repository->changeStatus($candidate, $dto);
    }
}
