<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCandidateRequest;
use App\Http\Requests\GetCandidatesRequest;
use App\Http\Requests\ShowCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use App\Services\CandidatesService;
use Illuminate\Http\JsonResponse;
use Ramsey\Collection\Collection;

class CandidatesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/candidates",
     *     @OA\Response(response="200", description="Display a listing of candidates.")
     * )
     */
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
}
