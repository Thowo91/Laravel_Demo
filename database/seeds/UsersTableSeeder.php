<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Thowo',
           'email' => 'Thomas.Worofsky@gmail.com',
           'email_verified_at' => now(),
           'password' => Hash::make('12345678'),
           'remember_token' => Str::random(10),
        ]);
    }
}
