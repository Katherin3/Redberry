<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCandidateRequest;
use App\Http\Requests\CreateCandidateStatusRequest;
use App\Http\Requests\GetCandidatesRequest;
use App\Http\Requests\GetCandidateTimelineRequest;
use App\Http\Requests\ShowCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Http\Resources\CandidateResource;
use App\Http\Resources\StatusResource;
use App\Services\CandidatesService;
use Illuminate\Http\JsonResponse;

class CandidatesController extends Controller
{
    public function index(GetCandidatesRequest $request, CandidatesService $candidatesService): JsonResponse
    {
        $items = $candidatesService->findMany($request->getDto());

        return CandidateResource::collection($items)->response();
    }

    public function show(ShowCandidateRequest $request, CandidatesService $candidatesService): JsonResponse
    {
        $item = $candidatesService->show($request->getDto());

        return (new CandidateResource($item))->response();
    }

    public function store(CreateCandidateRequest $request, CandidatesService $candidatesService): JsonResponse
    {
        $item = $candidatesService->create($request->getDto());

        return (new CandidateResource($item))->response();
    }

    public function update(UpdateCandidateRequest $request, CandidatesService $candidatesService): JsonResponse
    {
        $item = $candidatesService->update($request->getDto());

        return (new CandidateResource($item))->response();
    }

    public function changeStatus(CreateCandidateStatusRequest $request, CandidatesService $candidatesService): JsonResponse
    {
        $item = $candidatesService->changeStatus($request->getDto());

        return (new CandidateResource($item))->response();
    }

    public function getTimeline(GetCandidateTimelineRequest $request, CandidatesService $candidatesService): JsonResponse
    {
        $item = $candidatesService->getTimeline($request->getDto());

        return StatusResource::collection($item)->response();
    }
}
