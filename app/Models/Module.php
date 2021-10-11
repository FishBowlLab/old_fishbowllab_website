<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    //Table name
    protected $table = "modules";
    // primary key
    public $primaryKey = "id";
    
    public function lesson(){
        return $this->hasMany("App\Models\Lesson");
    }
}
