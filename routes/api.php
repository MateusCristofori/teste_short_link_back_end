<?php

use App\Http\Controllers\ShortlinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ShortlinkController::class, 'getAllLink']);

Route::post('/', [ShortLinkController::class, 'createURLHash']);

Route::get('/{hash}', [ShortLinkController::class, 'redirectToOriginalURL']);

Route::post('/click', [ShortlinkController::class, 'incrementCountClicks']);