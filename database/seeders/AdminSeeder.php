<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $admin = new Admin();
         $admin->name ="Admin";
         $admin->email="admin@gmail.com";
         $admin->password = Hash::make("admin890");
         $admin->is_admin =true;
         $admin->save();
    }
}
