<?php

use App\Http\Controllers\CandidatesController;
use Illuminate\Support\Facades\Route;

Route::resource('candidates', CandidatesController::class)
    ->only('index', 'store', 'update', 'show')
    ->parameter('candidates', 'id');



