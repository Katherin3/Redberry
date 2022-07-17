<?php

use App\Http\Controllers\CandidatesController;
use Illuminate\Support\Facades\Route;

Route::resource('candidates', CandidatesController::class)
    ->only('index', 'store', 'update', 'show')
    ->parameter('candidates', 'id');

Route::post('candidates/{candidateId}/change-status', [CandidatesController::class, 'changeStatus']);
Route::get('candidates/{candidateId}/timeline', [CandidatesController::class, 'getTimeline']);



