<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeansController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\AuthController; 
use App\Http\Controllers\FinalTicketController;

Route::get('/  ',  [LoginController::class, 'showLoginForm']);

 
Route::prefix('admin')->middleware("auth:admin")->group(function () {
    Route::get('/welcome',  function () {return view('admin.layout.welcome ');})->name('welcome');
    Route::get('/rooms', [AdminController::class, 'index'])->name('roomsList');
    Route::post('/rooms', [AdminController::class, 'create'])->name('createRoom');
    Route::get('/room/{room}/delete', [AdminController::class, 'destroy'])->name('deleteRoom');
    Route::get('/rooms/{room}/edit', [AdminController::class, 'show'])->name('showRoom');
    Route::put('/rooms/{room}', [AdminController::class, 'updateRoom'])->name('updateRoom');
    Route::get('/seats/{seat}/update', [AdminController::class, 'updateSeatType'])->name('updateSeatType');
    Route::get('/rooms/{room}/edit_seats', [AdminController::class, 'editSeatsPrices'])->name('editSeatsPrices');
    Route::put('/rooms/{room}/update_price', [AdminController::class, 'updateSeatsPrices'])->name('updateSeatsPrices');
  
    Route::get('/movies', [AdminController::class, 'indexSessions'])->name('sessionsList');
    Route::post('/movie', [AdminController::class, 'store'])->name('createMovie');
    Route::get('/sean/create/{movie_id}', [AdminController::class, 'createSession'])->name('createSeansForMovie');;   
    Route::post('/seans/{movie_id}', [AdminController::class, 'storeSession'])->name('createSeans');
    Route::get('/sales_start',  [AdminController::class, 'linkToClient']);
});


Route::prefix('client')->name('client')->group(function () {
    Route::get('/sessions/{date}', [SeansController::class, 'index'])->name('SessionsList');
    Route::get('/sessions/{seans}/tickets', [SeansController::class, 'show'])->name('SessionShow');

    Route::get('/sessions/{seans}/final_tickets/create', [FinalTicketController::class, 'create'])->name('GetFinalTicket');
    Route::get('/sessions/{seans}/final_tickets/{final_ticket}/showQr', [FinalTicketController::class, 'showQr'])->name('FinalTicketQr');

    Route::get('/tickets/{ticket}/update', [TicketController::class, 'update'])->name('SeatSelect');
    Route::get('/ticket/create/{seans}', [TicketController::class, 'create'])->name('TicketCreate');
    Route::get('/ticket/{seans}/', [TicketController::class, 'createQR'])->name('TicketQr');

  
   
});
Route::resource('sessions.final_tickets', FinalTicketController::class)->parameters([
    'sessions' => 'seans'
]);;

require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';