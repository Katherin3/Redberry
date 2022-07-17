<?php

use App\Http\Controllers\CandidatesController;
use Illuminate\Support\Facades\Route;

Route::resource('candidates', CandidatesController::class)
    ->only('index', 'store', 'update', 'show')
    ->parameter('candidates', 'id');

Route::post('candidates/{id}/change-status', [CandidatesController::class, 'changeStatus']);
Route::get('candidates/{id}/timeline', [CandidatesController::class, 'getTimeline']);



