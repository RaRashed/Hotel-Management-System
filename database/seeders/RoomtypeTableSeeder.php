<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::create([
            'title'=>"Single",
            'detail'=>"single room",
            'price'=>"2000"
        ]);
        RoomType::create([
            'title'=>"Double",
            'detail'=>" Double Room",
            'price'=>"3000"
        ]);
        RoomType::create([
            'title'=>"Master Room",
            'detail'=>"Master Room",
            'price'=>"5000"
        ]);
    }
}
