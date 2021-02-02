<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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

// Route::get('/income', [IncomeController::class, 'get']);
// Route::post('/income', [IncomeController::class, 'post']);
// Route::get('/income/{id}', [IncomeController::class, 'get']);
// Route::put('/income/{id}', [IncomeController::class, 'put']);
// Route::delete('/income/{id}', [IncomeController::class, 'delete']);
// Route::get('/expense', [ExpenseController::class, 'get']);
// Route::post('/expense', [ExpenseController::class, 'post']);
// Route::get('/expense/{id}', [ExpenseController::class, 'get']);
// Route::put('/expense/{id}', [ExpenseController::class, 'put']);
// Route::delete('/expense/{id}', [ExpenseController::class, 'delete']);
Route::apiResource('/incomes', IncomeController::class);
Route::apiResource('/expenses', ExpenseController::class);
Route::post('/register', [RegisterController::class, 'post']);
Route::post('/login', [LoginController::class, 'post']);
Route::post('/logout', [LogoutController::class, 'post']);
Route::get('/user', [UserController::class, 'get']);
Route::put('/put', [UserController::class, 'put']);

