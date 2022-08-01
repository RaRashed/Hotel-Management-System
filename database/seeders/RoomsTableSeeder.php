<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'title' =>"Room1",
            'room_type_id' =>"1"

        ]);
        Room::create([
            'title' =>"Room2",
            'room_type_id' =>"2"

        ]);
        Room::create([
            'title' =>"Room3",
            'room_type_id' =>"3"

        ]);
    }
}
