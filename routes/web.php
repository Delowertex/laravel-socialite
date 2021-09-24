<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginRegistrationController;
use App\Http\Controllers\DemoController;


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

Route::get('/home', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'dashboard']); 
//Route::get('/loginCallBack', [HomeController::class, 'loginCallBack']);
Route::get('/githubCallback', [LoginRegistrationController::class, 'callGithub'])->name('githublogin');

Route::get('/MakeMigratrionFile', [DemoController::class, 'MakeMigratrionFile']);
Route::get('/RunMigration', [DemoController::class, 'RunMigration']);
Route::get('/AppCacheClear', [DemoController::class, 'AppCacheClear']);
Route::get('/setEnvValue', [DemoController::class, 'setEnvValue']);  
Route::get('/envConfig', [DemoController::class, 'envConfig']);  
Route::get('/serverConfigCheck', [DemoController::class, 'serverConfigCheck']);  
