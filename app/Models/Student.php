<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['name_arabic', 'name_english', 'birth_date', 'educational_stage', 'major', 'email','phone','address','details','is_active'];
    
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student')
            ->withPivot(['is_paid', 'amount_paid', 'remaining_amount', 'start_date', 'end_date'])
            ->withTimestamps();
    }


}
