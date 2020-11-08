<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(types::class);
         $this->call(roles::class);
         $this->call(users::class);
         $this->call(news::class);
         $this->call(libraries::class);
         $this->call(FilesData::class);
         $this->call(slide_table::class);
    }
}
