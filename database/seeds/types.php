<?php

use Illuminate\Database\Seeder;

class types extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into types (type_name) values (?)', ['Thông báo']);
        DB::insert('insert into types (type_name) values (?)', ['Nhịp sống Đoàn - Hội']);
        DB::insert('insert into types (type_name) values (?)', ['Gương sáng sinh viên']);
        DB::insert('insert into types (type_name) values (?)', ['ĐOÀN THANH NIÊN - LỊCH SỬ HÌNH THÀNH']);
        DB::insert('insert into types (type_name) values (?)', ['HỘI SINH VIÊN - LỊCH SỬ HÌNH THÀNH']);
    }
}
