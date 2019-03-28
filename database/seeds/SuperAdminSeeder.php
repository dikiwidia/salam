<?php

use Illuminate\Database\Seeder;
use App\Salam\Admin;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'nickname' => 'admin',
            'passcode' => bcrypt('admin123'),
            'nama'     => 'Moch Diki Widianto',
            'status'   => 'A'
        ];
        
        Admin::insert($data);
    }
}
