<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(User::class, 10)->create();

        factory(User::class)->create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'password' => 'password',
            'image' => 'default.jpg',
            'phone' => '0985972185',
            'gender' => 1,
            'role' => 1,
            'birthday' => '1993-12-20',
            'address' => 'Da Nang Viet Nam',
        ]);
    }
}
