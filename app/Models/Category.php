<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categorys'; 
    protected $fillable = ['name'];

    public function courses()
    {
        return $this->hasMany(Course::class); 
    }
}
