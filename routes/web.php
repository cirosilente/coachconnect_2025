<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/gym', function () {
    return view('gym');
});

//rotta temporanea
Route::get('/db-check', function () {
    try {
        \DB::connection()->getPdo();
        return '✅ Connessione al database riuscita!';
    } catch (\Exception $e) {
        return '❌ Errore: ' . $e->getMessage();
    }
}); 


//Authentication:
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Profile:
Route::middleware(['auth'])->group(function () {
Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');
Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create');
Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');
Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update');
Route::delete('/profiles/{profile}', [ProfileController::class, 'destroy'])->name('profiles.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(CheckRole::class);

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/gym', function () {
    return view('gym');
})->name('gym');


Route::middleware(['auth'])->group(function () {
    Route::get('/messages/select-user', [MessageController::class, 'selectUser'])->name('messages.select');
    Route::get('/messages/{user}', [MessageController::class, 'index'])->name('messages.chat');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});
