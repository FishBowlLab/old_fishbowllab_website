<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MailingList extends Model
{
    use HasFactory, Notifiable;

    //Table name
    protected $table = "mailing_list";
    // primary key
    public $primaryKey = "email";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
    ];
}
