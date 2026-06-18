<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChatRequestController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto'])
        ->name('profile.photo');

    /*
    |--------------------------------------------------------------------------
    | Find User & Requests
    |--------------------------------------------------------------------------
    */

    Route::get('/find-user', [ChatRequestController::class, 'index'])
        ->name('find.user');

    Route::post('/send-request', [ChatRequestController::class, 'send'])
        ->name('send.request');

    Route::get('/requests', [RequestController::class, 'index'])
        ->name('requests.index');

    Route::post('/requests/{id}/accept', [RequestController::class, 'accept'])
        ->name('requests.accept');

    Route::post('/requests/{id}/reject', [RequestController::class, 'reject'])
        ->name('requests.reject');

    /*
    |--------------------------------------------------------------------------
    | Contacts
    |--------------------------------------------------------------------------
    */

    Route::get('/contacts', [ContactController::class, 'index'])
        ->name('contacts.index');

    /*
    |--------------------------------------------------------------------------
    | Chat
    |--------------------------------------------------------------------------
    */

    Route::get('/chat/{id}', [ChatController::class, 'index'])
        ->name('chat.index');

    Route::post('/chat/send', [ChatController::class, 'send'])
        ->name('chat.send');

    Route::get('/chat/fetch/{id}', [ChatController::class, 'fetchMessages'])
        ->name('chat.fetch');

    Route::post('/typing', [ChatController::class, 'typing'])
        ->name('chat.typing');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/messages', [AdminController::class, 'messages'])
            ->name('messages');

        Route::get('/messages/{id}/decrypt', [AdminController::class, 'decrypt'])
            ->name('decrypt');

            Route::get('/users', [AdminController::class, 'users'])
    ->name('admin.users');

Route::get('/users/{id}', [AdminController::class, 'showUser'])
    ->name('admin.users.show');

Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])
    ->name('admin.users.edit');

Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])
    ->name('admin.users.destroy');

    });

require __DIR__.'/auth.php';