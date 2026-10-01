<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Models\Event;
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
    $events = Event::query()->latest()->take(3)->get();
    return view('welcome', compact('events'));
});

Route::get('/dashboard', function () {
    $events = Event::query()->latest()->take(6)->get();
    return view('user.dashboard', compact('events'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/event', [EventController::class, 'index'])->name('event');
        Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
        Route::post('/event', [EventController::class, 'store'])->name('event.store');
        Route::get('/event/edit/{slug}', [EventController::class, 'edit'])->name('event.edit');
        Route::put('/event/{event}', [EventController::class, 'update'])->name('event.update');
        Route::match(['get', 'delete'], '/event/delete/{event}', [EventController::class, 'destroy'])->name('event.destroy');
        Route::get('/event/detail/{slug}', [EventController::class, 'detail'])->name('event.detail');
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction');
    });

    Route::get('events', [EventUserController::class, 'index'])->name('user.event');
    Route::get('events/{slug}', [EventUserController::class, 'payment'])->name('user.event.payment');
    Route::get('events/success/{trans}', [EventUserController::class, 'success'])->name('user.event.success');
    Route::get('myevents', [EventUserController::class, 'myEvent'])->name('user.event.myEvent');
    Route::get('about', [EventUserController::class, 'about'])->name('user.about');
});

require __DIR__ . '/auth.php';
