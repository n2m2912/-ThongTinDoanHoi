<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name' => 'Nguyễn Minh Mẫn',
            'username' => 'mannguyen',
            'password' => Hash::make('password'),
            'email' => 'mannguyen281129@gmail.com',
            'phone' => '0832496568',
            'role' => 1,
        ]);
        User::create([
            'full_name' => 'Trần Nhựt Anh',
            'username' => 'nhutanh',
            'password' => Hash::make('password'),
            'email' => 'nhutanhit@gmail.com',
            'phone' => '0000000000',
            'role' => 2,
        ]);
    }
}
