<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Model;

class User extends Model
{
    protected $collection  = 'users';
		protected $connection = 'mongodb';
		protected $fillable = ['name', 'lastName', 'email', 'phoneNumber', 'localCode', 'role'];
}
