<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QueryController;

Route::post('/query_store', [QueryController::class, 'query_store'])->name('api.query.store');
