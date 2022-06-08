<?php

namespace App\Models;

use App\Http\Middleware\Student;
use App\Models\Student as ModelsStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    use HasFactory;

    
  
      public function students(){
        return $this->belongsTo(ModelsStudent::class,'reg_number','id');
      }
      
      public function semesters(){
        return $this->belongsTo(Semester::class,'semester_id','id');
      }
      
      public function departments(){
        return $this->belongsTo(Department::class,'dep_name','id');
      }
      public function course_offers(){
        return $this->belongsTo(CourseOffer::class,'course_id','id');
      }
}
