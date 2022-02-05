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
Route::middleware(["AuthToken"])->group(function () {
    
    // view
    Route::get('v1/view', [BoardListController::class, 'View']);
    Route::get('v1/board', [BoardsController::class, 'Board']);
    Route::get('v1/member', [BoardsMemberController::class, 'Member']);
    Route::get('v1/cards', [CardsController::class, 'Cards']);

    // add data
    Route::post('v1/add', [BoardListController::class, 'Add']);
    Route::post('v1/boardadd', [BoardsController::class, 'BoardAdd'])->middleware("AuthToken");
    Route::post('v1/memberadd', [BoardsMemberController::class, 'MemberAdd']);
    Route::post('v1/cardadd', [CardsController::class, 'Cardadd']);

    // edit data
    Route::get('v1/getlist/{id}', [BoardListController::class, 'getList']);
    Route::put('v1/updatelist/{id}', [BoardListController::class, 'updateList']);

    Route::get('v1/getboard/{id}', [BoardsController::class, 'getBoard']);
    Route::put('v1/updateboard/{id}', [BoardsController::class, 'updateBoard']);

    Route::get('v1/getmember/{id}', [BoardsMemberController::class, 'getMember']);
    Route::put('v1/updatemember/{id}', [BoardsMemberController::class, 'updateMember']);

    Route::get('v1/getlcard/{id}', [CardsController::class, 'getCard']);
    Route::put('v1/updatecard/{id}', [CardsController::class, 'updateCard']);

    //logout
    Route::get('v1/logout', [UserController::class, 'logout']);
    // ->middleware("auth_token");

});

// register
Route::post('v1/register', [UserController::class, 'register']);

// login
Route::post('v1/login', [UserController::class, 'login']);
