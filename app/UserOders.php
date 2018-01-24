<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOders extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','f_name','l_name','email','password','phone', 'user_role', 'createdAt','updatedAt'];
    protected $id = 1;
    protected $f_name;
    protected $l_name;
    protected $email;
    protected $password;
    protected $phone;
    protected $user_role;
    protected $createdAt;
    protected $updatedAt;
    public $timestamps = false; // for false updated_at and created_at
}
