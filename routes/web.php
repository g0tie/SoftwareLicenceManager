<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LicenseKeyController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/activateKey', [LicenseKeyController::class, 'activateKey'])
->name("activateKey")
->middleware('auth');


Route::get('/generateKey', [LicenseKeyController::class, 'generateKey'])
->name("generateKey")
->middleware('auth');


require __DIR__.'/auth.php';
