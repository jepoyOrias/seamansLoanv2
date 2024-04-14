<?php

use App\Http\Controllers\Auth\CreateAdminController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\RepaymentController;
use App\Http\Controllers\RequirementsController;
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

Route::post('loans', [LoanController::class, 'store']);
Route::post('createpayment', [RepaymentController::class, 'store']);
Route::patch('loans/{id}', [LoanController::class, 'update']);
Route::post('/admin/register', [CreateAdminController::class, 'store'])->name('admin.register');
Route::get('/user/{userId}/requirements/download', [RequirementsController::class, 'downloadUserRequirements'])
->name('user.requirements.download');