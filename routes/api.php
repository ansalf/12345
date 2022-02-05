<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardListController;
use App\Http\Controllers\BoardsController;
use App\Http\Controllers\BoardsMemberController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// view
Route::get('v1/view', [BoardListController::class, 'view']);
Route::get('v1/matpel', [BoardsController::class, 'Matpel']);
Route::get('v1/guru', [BoardsMemberController::class, 'Guru']);
Route::get('v1/buku', [CardsController::class, 'Buku']);

// add data
Route::post('v1/view', [BoardListController::class, 'view']);
Route::post('v1/matpel', [BoardsController::class, 'Matpel']);
Route::post('v1/guru', [BoardsMemberController::class, 'Guru']);
Route::post('v1/buku', [CardsController::class, 'Buku']);
// edit data
Route::get('v1/getbuku/{id}/url/{id2}', [BukuController::class, 'getBuku']);
Route::put('v1/updatebuku/{id}', [BukuController::class, 'updateBuku']);

// register
Route::post('v1/register', [UserController::class, 'register']);

// login
Route::post('v1/login', [UserController::class, 'login']);


//logout
Route::get('v1/logout', [UserController::class, 'logout']);
// ->middleware("auth_token");
