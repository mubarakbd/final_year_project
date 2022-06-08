<?php

namespace Database\Seeders;

use App\Http\Middleware\Student;
use App\Models\Student as ModelsStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new ModelsStudent();
        $student->name ="Muabrak Hussain";
        $student->email="studen@gmail.com";
        $student->reg_number = "190303020102";
        $student->password = Hash::make("student890");
        $student->save();
    }
}
