<?php

use Illuminate\Database\Seeder;

class libraries extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into libraries (library_title, user_create_id) values ( ?, ?)', ['Images', 1]);
        DB::insert('insert into libraries (library_title, user_create_id) values ( ?, ?)', ['Videos', 1]);
        DB::insert('insert into libraries (library_title, user_create_id) values ( ?, ?)', ['Documents', 1]);
    }
}
