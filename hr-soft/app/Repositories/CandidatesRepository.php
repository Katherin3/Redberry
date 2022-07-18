<?php

namespace App\Repositories;

use App\DataTransferObjects\CreateCandidatesDTO;
use App\DataTransferObjects\CreateCandidateSkillsDTO;
use App\DataTransferObjects\CreateCandidateStatusDTO;
use App\DataTransferObjects\GetCandidatesDTO;
use App\DataTransferObjects\GetCandidateTimelineDTO;
use App\DataTransferObjects\UpdateCandidatesDTO;
use App\Interfaces\CandidatesRepositoryInterface;
use App\Models\Candidate;
use App\Models\CandidateStatus;
use App\Models\Media;
use App\Models\Queries\Filters\CandidateStatusFilter;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CandidatesRepository implements CandidatesRepositoryInterface
{
    public function find(int $id): ?Candidate
    {
        $candidate =  QueryBuilder::for($this->getModel())->find($id);

        $candidate->load('status', 'skill');

        return $candidate;
    }

    public function findMany(GetCandidatesDTO $dto): Collection
    {
        $candidates = QueryBuilder::for($this->getModel())
            ->allowedFilters([
                AllowedFilter::custom('status', new CandidateStatusFilter()),
            ])
            ->get();

        $candidates->load('status', 'skill');

        return $candidates;
    }

    public function create(CreateCandidatesDTO $dto): Candidate
    {
        return QueryBuilder::for($this->getModel())->create($dto->except('skillIds', 'files')->getValues());
    }

    public function update(Candidate $candidate, UpdateCandidatesDTO $dto): Candidate
    {
        $candidate->update($dto->except('skillIds', 'files')->getValues());

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

    public function getTimeline(Candidate $candidate): Collection
    {
        return $candidate->status()->get();
    }

    public function attachSkills(Candidate $candidate, CreateCandidateSkillsDTO $dto): void
    {
        $candidate->skill()->sync($dto->skillIds);
    }

    public function uploadMedia($candidateId, $uploadedFile): void
    {
        $fileName = time().' - '.$uploadedFile->getClientOriginalName();
        $type = $uploadedFile->getMimeType();

        Media::create([
            'candidate_id' => $candidateId,
            'name' => $fileName,
            'path' => public_path('storage'),
            'type' => $type
        ]);
    }

    public function getModel(): Candidate
    {
        return new Candidate();
    }
}
