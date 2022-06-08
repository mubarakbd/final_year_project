<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    public function semesters(){
        return $this->belongsTo(Semester::class,'semester_id','id');
      }
}
