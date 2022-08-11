<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::get('register',[RegisterController::class,'showRegisterForm'])->name('auth.register.form');
    Route::post('register',[RegisterController::class,'register'])->name('auth.register');
    Route::get('login',[LoginController::class,'showLoginForm'])->name('auth.login.form');
    Route::post('login',[LoginController::class,'login'])->name('auth.login');
    Route::get('logout',[LoginController::class,'logout'])->name('auth.logout');
    Route::get('email/send-verification',[VerificationController::class,'send'])->name('auth.email.send.verification');
    Route::get('email/verify',[VerificationController::class,'verify'])->name('auth.email.verify');
    Route::get('password/forget',[ForgetPasswordController::class,'showForgetForm'])->name('auth.password.forget.form');
    Route::post('password/forget',[ForgetPasswordController::class,'sendResetLink'])->name('auth.password.forget');
    Route::get('password/reset',[ResetPasswordController::class,'showResetForm'])->name('auth.password.reset.form');
    Route::post('password/reset',[ResetPasswordController::class,'reset'])->name('auth.password.reset');
});
