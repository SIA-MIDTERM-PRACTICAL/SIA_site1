<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;


class User extends Model {

    public $timestamps = false;

    protected $table = 'tblstudent';
    protected $primaryKey = 'studid';  
    protected $fillable = [
        'studid', 'lastname', 'firstname', 'middlename', 'bday', 'age'
    ];
}