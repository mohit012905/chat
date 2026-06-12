<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatRequestController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

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
        Route::get(
    '/contacts',
    [ContactController::class, 'index']
)->name('contacts.index');
Route::get(
    '/chat/{id}',
    [ChatController::class, 'index']
)->name('chat.index');

Route::post(
    '/chat/send',
    [ChatController::class, 'send']
)->name('chat.send');
Route::post('/typing', [ChatController::class, 'typing'])
    ->name('chat.typing');
    Route::post(
    '/profile/upload-photo',
    [ProfileController::class, 'uploadPhoto']
)->name('profile.photo');
}); // <-- IMPORTANT

require __DIR__.'/auth.php';
