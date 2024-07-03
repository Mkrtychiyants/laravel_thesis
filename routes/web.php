<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SeansController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\AdminController;


Route::get('/',  function () {return view('admin.layout.welcome ');});

Route::get('/rooms', [AdminController::class, 'index'])->name('rooms_list');
Route::post('/rooms', [AdminController::class, 'create'])->name('create_room');
Route::get('/room/{room}/delete', [AdminController::class, 'destroy'])->name('delete_room');
Route::get('/rooms/{room}/edit', [AdminController::class, 'show'])->name('show_room');
Route::put('/rooms/{room}', [AdminController::class, 'updateRoom'])->name('update_room');
Route::get('/seats/{seat}/update', [AdminController::class, 'updateSeatType'])->name('update_seat_type');


Route::get('/rooms/{room}/edit_seats', [AdminController::class, 'editSeatsPrices'])->name('edit_seats_prices');
Route::put('/rooms/{room}/update_price', [AdminController::class, 'updateSeatsPrices'])->name('update_seat_sprices');

Route::get('/movies', [AdminController::class, 'indexSessions'])->name('sessions_list');
Route::post('/movie', [AdminController::class, 'store'])->name('create_movie');
Route::get('/sean/create/{movie_id}', [AdminController::class, 'createSession']);   
Route::post('/seans/{movie_id}', [AdminController::class, 'storeSession'])->name('create_seans');

Route::get('/sessions/{date}', [SeansController::class, 'index'])->name('client_sessions_list');



// Route::post('/room', [RoomController::class, 'store'])->name('createRoom');
// Route::get('/room/{room}/delete', [RoomController::class, 'destroy'])->name('delete_room');
// Route::get('/rooms', [RoomController::class, 'index'])->name('rooms_list');
// Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('show_room'); 
// Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('edit_room');
// Route::get('/seats/{seat}', [SeatController::class, 'show']);
// Route::get('/seans', [SeansController::class, 'index']);
// Route::get('/movies', [MovieController::class, 'index']);
// Route::post('/movie', [MovieController::class, 'store'])->name('createMovie'); 
// Route::get('/sean/create/{movie_id}', [SeansController::class, 'create']);    
// Route::post('/seans', [SeansController::class, 'store'])->name('createSeans');

Route::get('/room/create', [RoomController::class, 'create']);




Route::get('/seans/{seans}', [SeansController::class, 'show']); 


Route::get('/movies/{movie}', [MovieController::class, 'show']);
Route::get('/movie/create', [MovieController::class, 'create']);
 
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/{ticket}', [TicketController::class, 'show']);
Route::get('/ticket/create', [TicketController::class, 'create']);  
Route::post('/ticket', [TicketController::class, 'store'])->name('createTicket');
Route::get('/seats', [SeatController::class, 'index']);

Route::get('/seat/create', [SeatController::class, 'create']);
Route::post('/seat', [SeatController::class, 'store'])->name('createSeat');
