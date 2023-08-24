<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = ['course_title', 'category_id', 'details', 'hours', 'start_date', 'teacher','max_students','course_price'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); 
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student')
            ->withPivot(['is_paid', 'amount_paid', 'remaining_amount', 'start_date', 'end_date'])
            ->withTimestamps();
    }
}
