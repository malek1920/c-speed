<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BilanController;
use App\Http\Controllers\Api\MvComptableController;
use App\Http\Controllers\Api\FolderComptableController;
use App\Http\Controllers\Api\BureauComptableController;
use App\Http\Controllers\Api\MessageController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login',[App\Http\Controllers\Api\UserController::class, 'index']);
Route::post('/register',[App\Http\Controllers\Api\UserController::class, 'register']);

//Bilan
Route::get('bilan',[App\Http\Controllers\Api\BilanController::class, 'index']);
Route::post('bilan/create',[App\Http\Controllers\Api\BilanController::class, 'create']);
Route::post('bilan/update',[App\Http\Controllers\Api\BilanController::class, 'update']);
Route::post('bilan/delete',[App\Http\Controllers\Api\BilanController::class, 'delete']);


// Mv Comptable
Route::get('mv-comptable',[App\Http\Controllers\Api\MvComptableController::class, 'index']);
Route::post('mv-comptable/create',[App\Http\Controllers\Api\MvComptableController::class, 'create']);
Route::post('mv-comptable/update',[App\Http\Controllers\Api\MvComptableController::class, 'update']);
Route::post('mv-comptable/delete',[App\Http\Controllers\Api\MvComptableController::class, 'delete']);


// Folder Comptable
Route::get('folder-comptable',[App\Http\Controllers\Api\FolderComptableController::class, 'index']);
Route::post('folder-comptable/create',[App\Http\Controllers\Api\FolderComptableController::class, 'create']);
Route::post('folder-comptable/update',[App\Http\Controllers\Api\FolderComptableController::class, 'update']);
Route::post('folder-comptable/delete',[App\Http\Controllers\Api\FolderComptableController::class, 'delete']);

// Compte
Route::get('/liste-compte',[App\Http\Controllers\Api\UserController::class, 'listeCompte']);

// Bureau Comptable
Route::get('bureau-comptable',[App\Http\Controllers\Api\BureauComptableController::class, 'index']);
Route::post('bureau-comptable/create',[App\Http\Controllers\Api\BureauComptableController::class, 'create']);
Route::post('bureau-comptable/update',[App\Http\Controllers\Api\BureauComptableController::class, 'update']);
Route::post('bureau-comptable/delete',[App\Http\Controllers\Api\BureauComptableController::class, 'delete']);
Route::post('get-bureau',[App\Http\Controllers\Api\BureauComptableController::class, 'getById']);

// User
Route::get('/get-user',[App\Http\Controllers\Api\UserController::class, 'getUserById']);
Route::get('/liste-user',[App\Http\Controllers\Api\UserController::class, 'listeUser']);
Route::post('/update-user',[App\Http\Controllers\Api\UserController::class, 'updateUser']);
Route::post('/delete-user',[App\Http\Controllers\Api\UserController::class, 'deleteUser']);

// Email 
Route::post('send-email',[App\Http\Controllers\Api\MessageController::class, 'sendMessage']);