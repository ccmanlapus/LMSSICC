<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
});

// Route::get('/dashboard/program-head', [ProgramHeadController::class, 'index'])->name('program-head.dashboard');
// Route::get('/dashboard/instructor', [InstructorController::class, 'index'])->name('instructor.dashboard');
// Route::get('/dashboard/student', [StudentController::class, 'index'])->name('student.dashboard');

Route::get('/dashboard', [RoleController::class, 'index'])->name('dashboard');
