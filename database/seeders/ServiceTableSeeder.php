<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'title' =>"Car rental services",
            'small_desc'=>"Car rental services",
            'detail_desc' =>"Car rental services",
            'photo' =>"service/T7vrl5EYY0R1Dxrrv7yigrTX4n8yWTUYlP80BWfV.jpg"

        ]);
        Service::create([
            'title' =>"Doctor on call",
            'small_desc'=>"Doctor on call",
            'detail_desc' =>"Doctor on call",
            'photo' =>"service/CCZPiKnWRs2NAetwmLpW3ZOiJaJ7Yu5zQKvgZubc.jpg"

        ]);
        Service::create([
            'title' =>"Restaurant",
            'small_desc'=>"Restaurant",
            'detail_desc' =>"Restaurant",
            'photo' =>"service/KjqwvEK4w5MN9wohzhuk0Gf3vPVoM3bPaMsQznTk.jpg"

        ]);
    }
}
