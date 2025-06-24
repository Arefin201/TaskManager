<?php

<<<<<<< HEAD
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
=======
>>>>>>> 5f4ca15e0088d935f8e297467f94f29c41419ad0
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
<<<<<<< HEAD

Route::post('/member-registration', [AuthController::class, "memberRegistration"]);
Route::post('/login', [AuthController::class, "login"]);


// Logout
Route::post('/logout', [AuthController::class, 'logout']);



   // Task - List all Routs
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
=======
>>>>>>> 5f4ca15e0088d935f8e297467f94f29c41419ad0
