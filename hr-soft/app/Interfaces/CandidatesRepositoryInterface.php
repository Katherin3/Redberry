<?php

namespace App\Interfaces;

use App\DataTransferObjects\CreateCandidatesDTO;
use App\DataTransferObjects\CreateCandidateSkillsDTO;
use App\DataTransferObjects\CreateCandidateStatusDTO;
use App\DataTransferObjects\GetCandidatesDTO;
use App\DataTransferObjects\GetCandidateTimelineDTO;
use App\DataTransferObjects\UpdateCandidatesDTO;
use App\Models\Candidate;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;

interface CandidatesRepositoryInterface
{
    public function find(int $id): ?Candidate;

    public function findMany(GetCandidatesDTO $dto): Collection;

    public function create(CreateCandidatesDTO $dto): Candidate;

    public function update(Candidate $candidate, UpdateCandidatesDTO $dto): Candidate;

    public function changeStatus(Candidate $candidate, CreateCandidateStatusDTO $dto): Candidate;

    public function getTimeline(GetCandidateTimelineDTO $dto): Candidate;

    public function attachSkills(Candidate $candidate, CreateCandidateSkillsDTO $dto): void;
}
