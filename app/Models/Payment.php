<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
     protected $table = 'payments';
    protected $fillable = [
        'course_student_id',
        'amount',
        'payment_date'
        ];
        public function courseStudent()
        {
            return $this->belongsTo(CourseStudent::class, 'course_student_id');
        }
}
