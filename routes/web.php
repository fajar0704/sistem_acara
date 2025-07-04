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
    $events = Event::take(3)->get();
    return view('welcome', compact('events'));
});

Route::get('/dashboard', function () {
    $events = Event::take(3)->get();
    return view('user.dashboard', compact('events'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware('admin')->name('admin.dashboard');
    Route::get('admin/event', [EventController::class, 'index'])->middleware('admin')->name('admin.event');
    Route::get('admin/event/create', [EventController::class, 'create'])->middleware('admin')->name('admin.event.create');
    Route::post('admin/event/', [EventController::class, 'store'])->middleware('admin')->name('admin.event.store');
    Route::get('admin/event/edit/{slug}', [EventController::class, 'edit'])->middleware('admin')->name('admin.event.edit');
    Route::put('admin/event/{event}', [EventController::class, 'update'])->middleware('admin')->name('admin.event.update');
    Route::get('admin/event/{event}', [EventController::class, 'destroy'])->middleware('admin')->name('admin.event.destroy');
    Route::get('admin/event/detail/{slug}', [EventController::class, 'detail'])->middleware('admin')->name('admin.event.detail');
    Route::get('admin/transactions', [TransactionController::class, 'index'])->middleware('admin')->name('admin.transaction');


    Route::get('events', [EventUserController::class, 'index'])->name('user.event');
    Route::get('events/{slug}', [EventUserController::class, 'payment'])->name('user.event.payment');
    Route::get('events/success/{trans}', [EventUserController::class, 'success'])->name('user.event.success');
    Route::get('myevents/', [EventUserController::class, 'myEvent'])->name('user.event.myEvent');
    Route::get('about/', [EventUserController::class, 'about'])->name('user.about');
});

require __DIR__.'/auth.php';
