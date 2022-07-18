<?php

namespace App\Services;

use App\DataTransferObjects\CreateCandidatesDTO;
use App\DataTransferObjects\CreateCandidateSkillsDTO;
use App\DataTransferObjects\CreateCandidateStatusDTO;
use App\DataTransferObjects\GetCandidatesDTO;
use App\DataTransferObjects\GetCandidateTimelineDTO;
use App\DataTransferObjects\ShowCandidatesDTO;
use App\DataTransferObjects\UpdateCandidatesDTO;
use App\Http\Requests\GetCandidateTimelineRequest;
use App\Interfaces\CandidatesRepositoryInterface;
use App\Models\Candidate;
use App\Models\Media;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Void_;

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

            if($dto->skillIds) {
                $this->attachCandidateSkills($item, new CreateCandidateSkillsDTO([
                    'candidateId' => $item->getId(),
                    'skillIds' => $dto->skillIds,
                ]));
            }

            if($dto->files) {
                $this->uploadMedia($item->getId(), $dto->files);
            }

            $item->load('status', 'skill');
        }

        return $item;
    }

    public function update(UpdateCandidatesDTO $dto): Candidate
    {
        $item = $this->find($dto->id);
        if(empty($item)) {
            throw new ModelNotFoundException();
        }

        $candidate = $this->repository->update($item, $dto);

        if($dto->skillIds) {
            $this->attachCandidateSkills($item, new CreateCandidateSkillsDTO([
                'candidateId' => $candidate->getId(),
                'skillIds' => $dto->skillIds,
            ]));

            if($dto->files) {
                $this->uploadMedia($item->getId(), $dto->files);
            }

            $item->load('skill');
        }

        return $candidate;
    }

    public function changeStatus(CreateCandidateStatusDTO $dto): Candidate
    {
        $candidate = $this->find($dto->candidateId);

        if(empty($candidate)) {
            throw new ModelNotFoundException();
        }

        return $this->repository->changeStatus($candidate, $dto);
    }

    public function getTimeline(GetCandidateTimelineDTO $dto): Collection
    {
        $candidate = $this->find($dto->candidateId);

        if(empty($candidate)) {
            throw new ModelNotFoundException();
        }

        return $this->repository->getTimeline($candidate);
    }

    public function attachCandidateSkills(Candidate $candidate, CreateCandidateSkillsDTO $dto): void
    {
        $candidate = $this->find($dto->candidateId);

        if(empty($candidate)) {
            throw new ModelNotFoundException();
        }

        $this->repository->attachSkills($candidate, $dto);
    }

    public function uploadMedia($candidateId, $file): void
    {
        $uploadedFile = $file['cv'];
        $filename = time().' - '.$uploadedFile->getClientOriginalName();

        Storage::disk('local')->putFileAs(
            'public',
            $uploadedFile,
            $filename
        );

        $this->repository->uploadMedia($candidateId, $uploadedFile);
    }
}
