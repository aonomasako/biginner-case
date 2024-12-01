<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Models\Register;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'index']);
    Route::get('/work_start', [WorkController::class, 'workstart']);
    Route::get('/work_end', [WorkController::class, 'index']);
    Route::get('/rest_start', [RestController::class, 'reststart']);
    Route::get('/rest_end', [RestController::class, 'workstart']);
    Route::get('/attendance',[UserController::class,'showAttendance']);
    Route::post('/attendance', [UserController::class, 'showAttendance']);
    Route::get('/attendance/subday',[UserController::class,'yesterday']);
});