<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Users routes
Route::get('/add-user', [UserController::class, 'create'])->name('add-user');
Route::post('/add-user', [UserController::class, 'store'])->name('store-user');
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::put('/edit-user/{id}', [UserController::class, 'update'])->name('update-user');
Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');
Route::get('/add-user-role/{id}', [UserController::class, 'createRole'])->name('add-user-role');
Route::post('/add-user-role/{id}', [UserController::class, 'storeRole'])->name('store-user-role');

Route::post('/delete-user-role/{id}', [UserController::class, 'removeRole'])->name('delete-user-role');

//Roles
Route::get('/roles', [RoleController::class, 'index'])->name('index-roles');
Route::get('/add-role', [RoleController::class, 'create'])->name('add-role');
Route::post('/add-role', [RoleController::class, 'store'])->name('store-role');
Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('edit-role');
Route::put('/edit-role/{id}', [RoleController::class, 'update'])->name('update-role');
Route::delete('/delete-role/{id}', [RoleController::class, 'destroy'])->name('delete-role');

});

require __DIR__.'/auth.php';
