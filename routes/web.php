<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Settings\AccountController;

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
Route::get('/dashboard',[HomeController::class, 'index'])->name('home');

Route::middleware(['auth','verified'])->group(function () {
 route::get('/contacts',[ContactController::class, 'index'])->name('contacts.contact');
 route::post('/contacts',[ContactController::class, 'store'])->name('contacts.store');

 route::get('/contacts/create',[ContactController::class, 'create'])->name('contacts.create');

 route::get('/contacts/{id}',[ContactController::class, 
 'show'])->name('contacts.show');

 route::put('/contacts/{id}',[ContactController::class, 
 'update'])->name('contacts.update');

 route::delete('/contacts/{id}',[ContactController::class, 
 'destroy'])->name('contacts.destroy');
 
 route::get('/contacts/{id}/edit',[ContactController::class, 
 'edit'])->name('contacts.edit');
});
Route::resource('/companies', CompanyController::class);
 Auth::routes(['verify'=>true]);
 Route::get('/settings/account', [AccountController::class, 'index']);

