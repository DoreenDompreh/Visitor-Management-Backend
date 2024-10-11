<?php

use App\Http\Controllers\FrequencyController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\PurposeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('host/list-hosts', [HostController::class, "listHostResources"]);
Route::get('purpose/list-purposes', [PurposeController::class, "listPurposeResources"]);
Route::get('frequency/list-frequencies', [FrequencyController::class, "listFrequencyResources"]);
