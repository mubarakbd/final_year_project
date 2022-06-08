<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterCourse extends Model
{
    use HasFactory;

 public function course_offers(){
  return $this->belongsTo(CourseOffer::class,'course_id');

}

public function teachers(){
  return $this->belongsTo(Teacher::class,'teacher_id','id');
}

public function semesters(){
  return $this->belongsTo(Semester::class,'semester_id','id');
}
}
