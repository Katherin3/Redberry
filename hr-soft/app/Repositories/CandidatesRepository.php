<?php

namespace App\Repositories;

use App\DataTransferObjects\CreateCandidatesDTO;
use App\DataTransferObjects\CreateCandidateStatusDTO;
use App\DataTransferObjects\GetCandidatesDTO;
use App\DataTransferObjects\UpdateCandidatesDTO;
use App\Interfaces\CandidatesRepositoryInterface;
use App\Models\Candidate;
use App\Models\CandidateSkill;
use App\Models\CandidateStatus;
use App\Models\Queries\Filters\CandidateStatusFilter;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CandidatesRepository implements CandidatesRepositoryInterface
{
    public function find(int $id): ?Candidate
    {
        $candidate =  QueryBuilder::for($this->getModel())->find($id);

        $candidate->load('status');

        return $candidate;
    }

    public function findMany(GetCandidatesDTO $dto): Collection
    {
        $candidates = QueryBuilder::for($this->getModel())
            ->allowedFilters([
                AllowedFilter::custom('status', new CandidateStatusFilter()),
            ])
            ->get();

        $candidates->load('status');

        return $candidates;
    }

    public function create(CreateCandidatesDTO $dto): Candidate
    {
        $candidate = QueryBuilder::for($this->getModel())->create($dto->except('skillIds', 'cv')->getValues());

        CandidateStatus::create([
            'candidate_id' => $candidate->getId(),
            'status_id' => Status::INITIAL_STATUS,
        ]);

        $candidate->load('status');

        return $candidate;
    }

    public function update(Candidate $candidate, UpdateCandidatesDTO $dto): Candidate
    {
        $candidate->update($dto->except('skillIds', 'cv')->getValues());

        $candidate->load('status');

        return $candidate;
    }

    public function changeStatus(Candidate $candidate, CreateCandidateStatusDTO $dto): Candidate
    {
        CandidateStatus::updateOrCreate([
            'candidate_id' => $dto->candidateId,
            'status_id' => $dto->statusId,
        ],
        [
            'comment' => $dto->comment
        ]);

        $candidate->load('status');

        return $candidate;
    }

    public function getModel(): Candidate
    {
        return new Candidate();
    }
}
