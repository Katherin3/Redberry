<?php

namespace App\Services;

use App\DataTransferObjects\CreateCandidatesDTO;
use App\DataTransferObjects\CreateCandidateStatusDTO;
use App\DataTransferObjects\GetCandidatesDTO;
use App\DataTransferObjects\GetCandidateTimelineDTO;
use App\DataTransferObjects\ShowCandidatesDTO;
use App\DataTransferObjects\UpdateCandidatesDTO;
use App\Http\Requests\GetCandidateTimelineRequest;
use App\Interfaces\CandidatesRepositoryInterface;
use App\Models\Candidate;
use App\Models\Status;
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
        $item = $this->repository->create($dto);

        if(!empty($item)) {
            $this->changeStatus(new CreateCandidateStatusDTO([
                'candidateId' => $item->getId(),
                'statusId' => Status::INITIAL_STATUS,
            ]));

            $item->load('status');
        }

        return $item;
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

    public function getTimeline(GetCandidateTimelineDTO $dto): Candidate
    {
        $candidate = $this->find($dto->id);

        if(empty($candidate)) {
            throw new ModelNotFoundException();
        }

        return $this->repository->getTimeline($dto);
    }

}
