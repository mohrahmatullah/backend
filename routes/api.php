<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ReimbursmentController;
use App\Http\Controllers\ReimbursementTypeController;
use App\Http\Controllers\ApprovalStatusController;

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

Route::post('/register', [AuthController::class, 'register']);
//API route for login user
Route::post('/login', [AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', function(Request $request) {
        return auth()->user();
    });

    Route::get('employee', [EmployeeController::class, 'index']);
    Route::post('employee', [EmployeeController::class, 'saveUpdate']);

    Route::get('reimbursments', [ReimbursmentController::class, 'index']);
    Route::post('reimbursments', [ReimbursmentController::class, 'saveUpdate']);
    
    Route::get('reimbursments-type', [ReimbursementTypeController::class, 'index']);
    Route::post('reimbursments-type', [ReimbursementTypeController::class, 'saveUpdate']);

    Route::get('approval-status', [ApprovalStatusController::class, 'index']);

    Route::post('delete', [AjaxController::class, 'selectItemId']);
    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});