<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Seans;
use App\Models\Ticket;
use App\Models\Seat;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Services\RoomCreateService;
use App\Services\UpdateRoomService;
use App\Services\CreateMovieService;
use App\Services\UpdateSeatPriceService;
use App\Services\CreateSessionService;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Requests\UpdateSeatPriceRequest;
use App\Http\Requests\CreateSessionRequest;


class AdminController extends Controller
{
    public function index()
    {
        $rooms = DB::table('rooms')->get();
        
        return view('admin.rooms_adm', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        (new RoomCreateService())->create();

        return redirect(route('roomsList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {   
        (new CreateMovieService())->store();


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
        {
        $rooms = DB::table('rooms')->get();
        $seats = $room->seats;
        $nubmerSeats=0;
        // dd( $seats);
        return view('admin.room_config', ['currentRoom' => $room,'rooms' => $rooms, 'seats' => $seats] );
    }

     /**
     * Update the specified resource in storage.
     */
    public function updateRoom(UpdateRoomRequest $request, Room $room)
    {

        (new UpdateRoomService())->updateRoom($request->validated(), $room);

        return back()->withInput();
    }

    public function updateSeatType(Seat $seat)
    {
        if($seat->is_blocked){
            $seat->update(
            [
                'is_blocked' => false,
                'is_vip' => false,
            ]);
        } else if (!($seat->is_vip)) {
            $seat->update(
                [
                    'is_vip' => true,
                ]);
        }else {
            $seat->update(
                [
                    'is_vip' => false,
                    'is_blocked' => true,
                ]);
        }

        return back()->withInput();
    }

    public function editSeatsPrices(Room $room)
    {
        $rooms = DB::table('rooms')->get();
        $seats = $room->seats()->get();
        $casualSeat = $seats->where('is_vip',false)->first();
        $vipSeat = $seats->where('is_vip',true)->first();
        return view('admin.room_prices_config', ['rooms' => $rooms, 'seats' => $seats, 'currentRoom' => $room]);
    }
 /**
     * Store a newly created resource in storage.
     */
    public function updateSeatsPrices(UpdateSeatPriceRequest $request, Room $room)
    {
        (new UpdateSeatPriceService())->updateSeatsPrices($request->validated(), $room);

        return redirect(route('sessionsList'));
    }

    public function indexSessions()
    {
        $rooms = DB::table('rooms')->get();
        $movies = DB::table('movies')->get();
        $seanses = DB::table('seans')->orderBy('start', 'asc')->get();
        return view('admin.sessions_config', ['movies' => $movies, 'seanses' => $seanses, 'rooms' => $rooms]);
    }
    public function createSession($movie_id)
    {
        return view('admin.createSeans', ['movie_id' => $movie_id]);
    }
    public function storeSession(CreateSessionRequest $request, $movie_id)
    {
        (new CreateSessionService())->storeSession($request->validated(), $movie_id);
        return redirect(route('sessionsList'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room ->delete();
        return back();
    }

    public function linkToClient()
    {
        return view('admin.linkToClient');
    }
}
