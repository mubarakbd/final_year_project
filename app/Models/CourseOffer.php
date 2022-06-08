<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseOffer extends Model
{
    use HasFactory;
    protected $table ="course_offers";
    protected $fillable =['course_name','course_code','course_credit'];

    
}
