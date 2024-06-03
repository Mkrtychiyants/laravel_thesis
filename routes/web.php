<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SeansController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SeatController;

Route::get('/', function () {
    return view('layout.welcome');
});

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms_list');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('show_room');
Route::get('/room/create', [RoomController::class, 'create']);
Route::get('/room/{room}/delete', [RoomController::class, 'destroy'])->name('delete_room');
Route::post('/room', [RoomController::class, 'store'])->name('createRoom');
Route::get('/seans', [SeansController::class, 'index']);
Route::get('/seans/{seans}', [SeansController::class, 'show']);
Route::get('/sean/create', [SeansController::class, 'create']);    
Route::post('/seans', [SeansController::class, 'store'])->name('createSeans');
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{movie}', [MovieController::class, 'show']);
Route::get('/movie/create', [MovieController::class, 'create']);
Route::post('/movie', [MovieController::class, 'store'])->name('createMovie');
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/{ticket}', [TicketController::class, 'show']);
Route::get('/ticket/create', [TicketController::class, 'create']);
Route::post('/ticket', [TicketController::class, 'store'])->name('createTicket');
Route::get('/seats', [SeatController::class, 'index']);
Route::get('/seats/{seat}', [SeatController::class, 'show']);
Route::get('/seat/create', [SeatController::class, 'create']);
Route::post('/seat', [SeatController::class, 'store'])->name('createSeat');
