<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    //Table name
    protected $table = "teachers";
    // primary key
    public $primaryKey = "id";
    protected $fillable = ['teacher_id'];

    public function lesson(){
        return $this->hasMany("App\Models\Lesson");
    }
    public function student(){
        return $this->hasMany("App\Models\Student");
    }
}
