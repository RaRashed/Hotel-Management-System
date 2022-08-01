<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::create([
            'customer_id'=>"1",
            'testi_cont' =>"Best service"
        ]);
        Testimonial::create([
            'customer_id'=>"2",
            'testi_cont' =>"very good service"
        ]);
    }
}
