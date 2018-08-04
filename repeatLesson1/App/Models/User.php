<?php

namespace App\Models;


use App\Model;

class User extends Model
{
    public static $table = 'passwords';

    public $login;
    public $password;
    public $data;

}