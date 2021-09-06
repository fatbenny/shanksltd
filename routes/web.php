<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\starsController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login',[starsController::class, 'login_in']);
Route::get('/logout',[starsController::class, 'logout']);


Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register',[starsController::class, 'register_in']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/daily',[starsController::class, 'index']);