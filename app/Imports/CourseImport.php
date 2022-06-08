<?php

namespace App\Imports;

use App\Models\CourseOffer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CourseImport implements ToModel ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CourseOffer([
             'course_name' =>$row['course_name'],
             'course_code' =>$row['course_code'],
             'course_credit' =>$row['course_credit']
        ]);
    }
}
