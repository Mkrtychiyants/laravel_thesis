<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SeansController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;


Route::get('/admin/',  function () {return view('admin.layout.welcome ');});
Route::get('/user/sales_start',  function () {return view('admin.layout.link_to_client');});


Route::get('/rooms', [AdminController::class, 'index'])->name('rooms_list');
Route::post('/rooms', [AdminController::class, 'create'])->name('create_room');
Route::get('/room/{room}/delete', [AdminController::class, 'destroy'])->name('delete_room');
Route::get('/rooms/{room}/edit', [AdminController::class, 'show'])->name('show_room');
Route::put('/rooms/{room}', [AdminController::class, 'updateRoom'])->name('update_room');
Route::get('/rooms/{room}/edit_seats', [AdminController::class, 'editSeatsPrices'])->name('edit_seats_prices');
Route::put('/rooms/{room}/update_price', [AdminController::class, 'updateSeatsPrices'])->name('update_seat_sprices');
Route::get('/room/create', [RoomController::class, 'create']);

Route::get('/movies', [AdminController::class, 'indexSessions'])->name('sessions_list');
Route::post('/movie', [AdminController::class, 'store'])->name('create_movie');
Route::get('/sean/create/{movie_id}', [AdminController::class, 'createSession']);   
Route::post('/seans/{movie_id}', [AdminController::class, 'storeSession'])->name('create_seans');

Route::get('/sessions/{date}', [SeansController::class, 'index'])->name('client_sessions_list');
Route::get('/sessions/{seans}/tickets', [SeansController::class, 'show'])->name('client_session_show');

Route::get('/tickets/{ticket}/update', [TicketController::class, 'update'])->name('client_seat_select');
Route::get('/ticket/create/{seans}', [TicketController::class, 'create'])->name('client_ticket_create');
Route::get('/ticket/{seans}/', [TicketController::class, 'createQR'])->name('client_ticket_qr');
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/{ticket}', [TicketController::class, 'show']);
Route::post('/ticket', [TicketController::class, 'store'])->name('createTicket');


Route::get('/movies/{movie}', [MovieController::class, 'show']);
Route::get('/movie/create', [MovieController::class, 'create']);
 
Route::get('/seats/{seat}/update', [AdminController::class, 'updateSeatType'])->name('update_seat_type');
Route::get('/seats', [SeatController::class, 'index']);
Route::get('/seat/create', [SeatController::class, 'create']);
Route::post('/seat', [SeatController::class, 'store'])->name('createSeat');


Route::middleware("guest:web")->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login'])->name('login_attempt'); 
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register'])->name('register_attempt');
    
});

Route::middleware("auth:web")->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});