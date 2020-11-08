<?php

use Illuminate\Database\Seeder;

class FilesData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into files (file_name, file_type, file_path, user_upload_id, library, new) values (?, ?, ?, ?, ?, ?)', ['5D3_6099.jpg', 'jpg', '/images', 1, null, 1]);
        DB::insert('insert into files (file_name, file_type, file_path, user_upload_id, library, new) values (?, ?, ?, ?, ?, ?)', ['5D3_5610.jpg', 'jpg', '/images', 1, null, 1]);
        DB::insert('insert into files (file_name, file_type, file_path, user_upload_id, library, new) values (?, ?, ?, ?, ?, ?)', ['facebook PR.jpg', 'jpg', '/images', 1, null, 3]);
        DB::insert('insert into files (file_name, file_type, file_path, user_upload_id, library, new) values (?, ?, ?, ?, ?, ?)', ['HUTE9533.jpg', 'jpg', '/images', 1, null, 4]);
        DB::insert('insert into files (file_name, file_type, file_path, user_upload_id, library, new) values (?, ?, ?, ?, ?, ?)', ['Sy Luan (3).jpg', 'jpg', '/images', 1, null, 2]);
    }
}
