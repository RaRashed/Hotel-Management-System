<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'full_name'=>"Rashedul Aziz Rashed",
            'email'=>"admin@gmail.com",
            'password'=>sha1("12345678"),
            'phone'=>"01827801715",
            'address'=>"Dhaka",
            'photo'=>"fc3707fa908df1e82e30ecbdae3d094804a8f87d"
        ]);
        Customer::create([
            'full_name'=>"Toha",
            'email'=>"toha@gmail.com",
            'password'=>sha1("12345678"),
            'phone'=>"01621796596",
            'address'=>"Dhaka",
            'photo'=>"fc3707fa908df1e82e30ecbdae3d094804a8f87d"
        ]);
    }
}
