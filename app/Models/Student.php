<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    //Table name
    protected $table = "students";
    // primary key
    public $primaryKey = "id";

    protected $fillable = ['student_id'];
    
    public function teacher(){
        return $this->belongsTo("App\Models\Teacher");
    }
    public function lessons(){
        return $this->hasMany("App\Models\Lesson");
    }
}
