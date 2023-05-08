<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

// pages
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');

// Route::group(['middleware' => ['role:admin']], function () {

Route::post('form-store', [FormController::class, 'store'])->name('form-store');
// });
Route::get('form', [FormController::class, 'create'])->name('form-display');

Route::get('list', [FormController::class, 'index'])->name('list');

Route::get('single/{id}', [FormController::class, 'show'])->name('single-details');
Route::get('confirm', [FormController::class, 'show'])->name('single');

Route::get('update-form/{id}', [FormController::class, 'edit'])->name('update-form');

Route::patch('update-form/{id}', [FormController::class, 'update'])->name('update');

Route::delete('destroy/{id}', [FormController::class, 'destroy'])->name('destroy');

Route::get('pdf/{id}', [FormController::class, 'showpdf'])->name('pdf');

// Route::get('form', [FormController::class, 'create'])->name('form-display');
// Route::post('form-store', [FormController::class, 'store'])->middleware('auth')->name('form-store');
