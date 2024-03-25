<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'userList'])->name('profile.list');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('users/deleted', [UserController::class, 'deleted'])->name('users.deleted');
    Route::resource('users', UserController::class);
    Route::post('users/{user_id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('users/{user_id}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');

    //User Address
    Route::get('user-address-create', [UserAddressController::class, 'create'])->name('user.address.create');
    Route::post('user-address-store', [UserAddressController::class, 'store'])->name('user.address.store');


});

require __DIR__.'/auth.php';
