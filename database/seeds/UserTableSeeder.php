<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            'username' => 'admin',
            'email' => 'admin@bookstock.com',
            'password' => Hash::make('admin123'),
            'role' => 'ADMIN'
        ];

        User::create($fields);
    }
}
