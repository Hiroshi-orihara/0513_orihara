<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::apiResource('/test',TestController::class);
