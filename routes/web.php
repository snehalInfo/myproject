<?php

use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified'])->group(function () {

	//SuperAdmin route
    Route::prefix('superadmin')->group( function() {
    	Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
    	Route::get('/invitelist', [SuperAdminController::class, 'inviteList'])->name('superadmin.invitelist');
    	Route::get('/invitation', [SuperAdminController::class, 'invitation'])->name('superadmin.invitation');
    	Route::post('/invite', [SuperAdminController::class, 'invite'])->name('superadmin.invite');
    	Route::get('/urllist', [SuperAdminController::class, 'urlList'])->name('superadmin.urllist');

    });

    Route::resource('company', CompanyController::class);


    Route::prefix('admin')->group( function() {
    	Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    	Route::get('/invitelist', [AdminController::class, 'inviteList'])->name('admin.invitelist');
    	Route::get('/invitation', [AdminController::class, 'invitation'])->name('admin.invitation');
    	Route::post('/invite', [AdminController::class, 'invite'])->name('admin.invite');
    	Route::get('/urllist', [AdminController::class, 'urlList'])->name('admin.urllist');
    	Route::post('/createurl', [AdminController::class, 'createUrl'])->name('admin.createurl');
    });

    //Member route
    Route::get('/dashboard', [MemberController::class, 'index'])->name('dashboard');
    Route::post('/createurl', [MemberController::class, 'createUrl'])->name('createurl');
});

require __DIR__.'/auth.php';
