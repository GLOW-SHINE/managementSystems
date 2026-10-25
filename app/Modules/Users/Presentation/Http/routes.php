<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Users\Presentation\Http\Controllers\UserController;




//Route::prefix('users')->middleware(['auth'])->group(function () {
Route::prefix('users')->group(function () {
    Route::controller(UserController::class)->group(function () {

        // get all Users
        Route::get('/', 'index')->name('users.index');
        // create Users
        Route::post('/', 'store')->name('users.store');
        // Get Single User
        Route::get('/{id}', 'show')->name('users.show');
        // Update User
        Route::put('/{id}', 'update')->name('users.update');
        // Delete User
        Route::delete('/{id}', 'destroy')->name('users.destroy');
    });
});



Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');




Route::get('/admin/users', function () {
    return view('users::users.index');
})->name('admin.users.index');