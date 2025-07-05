<?php

use Illuminate\Support\Facades\Route;
// <<<<<<< HEAD
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
// =======
// >>>>>>> 5f4ca15e0088d935f8e297467f94f29c41419ad0

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
