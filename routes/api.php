<?php

// <<<<<<< HEAD
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
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

Route::post('/member-registration', [AuthController::class, "memberRegistration"]);
Route::post('/login', [AuthController::class, "login"]);



Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::delete('/delete-tasks/{id}',[TaskController::class,"taskDelete"]);
Route::get('/task/{id}',[TaskController::class,"getSingleTask"]);
Route::put('/update-task/{id}',[TaskController::class,"updateTask"]);
Route::put('/update-status/{id}',[TaskController::class,"updateStatus"]);
Route::put("/undo-task-from-in-progress/{id}",[TaskController::class,"undoTaskFromInProgress"]);
Route::put("/task-done/{id}",[TaskController::class,"taskDone"]);
Route::put("/undo-task-from-in-done/{id}",[TaskController::class,"undoTaskFormInDone"]);

