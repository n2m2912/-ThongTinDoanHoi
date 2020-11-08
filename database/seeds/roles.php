<?php

use Illuminate\Database\Seeder;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into roles (role_name) values (?)', ['Admin']);
        DB::insert('insert into roles (role_name) values (?)', ['User']);
    }
}
