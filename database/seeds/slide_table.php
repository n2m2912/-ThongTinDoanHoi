<?php

use Illuminate\Database\Seeder;

class slide_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into slide (imager_name) values (?)', ['08_998x280_pc-1517879915.png']);
        DB::insert('insert into slide (imager_name) values (?)', ['09_998x280_pc-1517880235.png']);
        DB::insert('insert into slide (imager_name) values (?)', ['10_998x280_pc-1517879955.png']);
    }
}
