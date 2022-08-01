<?php

namespace Database\Seeders;

use App\Models\FrontendImage;
use Illuminate\Database\Seeder;

class FrontendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrontendImage::create([
            'image' =>"frontendimgs/DTCdzXHtV9JFZOsEoDm7VypBUMLIW21uP3XHoaAo.jpg"
        ]);

        FrontendImage::create([
            'image' =>"frontendimgs/KhmCfzY5qviKfHV4QkNDV6jHtHwTXlKSbS6UNn8a.jpg"
        ]);
        FrontendImage::create([
            'image' =>"frontendimgs/ZcjuVTBRsL7pdh6BeigwIyxY1eZTdawZIxKRshin.jpg"
        ]);
    }
}
