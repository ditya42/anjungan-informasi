<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "kukuh";
        $administrator->name = "Kukuh Aprianto";
        $administrator->email = "kaprianto@gmail.com";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("123456789");
        $administrator->address = "Tanjung";
        $administrator->phone = '085248036099';
        $administrator->avatar = 'kukuh.jpg';
        $administrator->status = 'ACTIVE';
        $administrator->save();
    }
}
