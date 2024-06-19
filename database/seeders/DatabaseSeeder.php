<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\Seans;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Room::factory()->count(1)->create();
        // Room::factory()->has(Seans::factory()->count(3))->count(1)->create();

        DB::table('rooms')->insert([
            'title' => Str::random(10),
            'rows' => 5,
            'columns' => 5,
        ]);
         DB::table('seans')->insert([
            'room_id' => 1,
            'movie_id' => 1,
            'start' => Carbon::now(),
            'finish' => Carbon::now()->addHours(2),
        ]);
        DB::table('movies')->insert([
            'title' => "Movie #1",
            'duration' => 90,
            'country' => "USA",
            'director' => 'Jim Jarmusch',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tickets')->insert([
            'seans_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('seats')->insert([
            'room_id' => 1,
            'ticket_id' => 1,
            'row' => 1,
            'price' => 100,
            'is_vip' => false,
            'is_blocked' => false,
            'is_selected'=> false,
            'is_purchased'=> false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
