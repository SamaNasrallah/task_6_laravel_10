<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;
protected $table = 'course_student';
protected  $fillable=[
    'course_id',
    'student_id',
    'is_paid',
    'amount_paid',
    'remaining_amount',
    'start_date',
    'end_date'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
