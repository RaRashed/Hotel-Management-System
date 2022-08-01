<?php

namespace Database\Seeders;

use App\Models\Roomtypeimage;
use Illuminate\Database\Seeder;

class RoomtypeImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roomtypeimage::create([
            'room_type_id' =>"1",
            'image_src' =>"imgs/BkKe8o7QGe3cMz0q3tjrqCKhm4ImrTuNgCSb1vj7.jpg"


        ]);
        Roomtypeimage::create([
            'room_type_id' =>"1",
            'image_src' =>"imgs/vm2499CD7cORUxkPsu9M84R4zWNqqlYIGYYSspyi.jpg"


        ]);
        Roomtypeimage::create([
            'room_type_id' =>"1",
            'image_src' =>"imgs/4ewt8ExXhzX00Pdj1aZPjxCGPTb1yZ0NflQ0oS0W.jpg"


        ]);
        Roomtypeimage::create([
            'room_type_id' => "2",
            'image_src' =>"imgs/UyeRKFhb2VZvmfnsSqNoni338iAJxEbYBJPZYe1Z.jpg"


        ]);
        Roomtypeimage::create([
            'room_type_id' =>"2",
            'image_src' =>"imgs/vbFz77kfVx7PyQhiO7gmvDj2nu4g34pPEWKq8ePM.jpg"


        ]);
        Roomtypeimage::create([
            'room_type_id' =>"3",
            'image_src' =>"imgs/U1bIUlUxQXgxbl6pnf4D8DIPrNSPZMPW7GYe447S.jpg"


        ]);
        Roomtypeimage::create([
            'room_type_id' =>"3",
            'image_src' =>"imgs/6NRMXqRdBBnjR2aG9iho6apCkRqWt5dKBWhU3262.jpg"


        ]);
        Roomtypeimage::create([
            'room_type_id' =>"3",
            'image_src' =>"imgs/s9to1ZHtJPyR2GUSPhxypMZFvHnzS4DkxGPKHRJj.jpg"


        ]);

    }
}
