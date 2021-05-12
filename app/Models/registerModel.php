<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registerModel extends Model
{
    use Authenticatable;
    protected $table= "login_register";

    public $timestamps= false;

    protected $fillable= [
        'name',
        'email',
        'password',
        're_password',
        'role',
        'user_id',
         
];
protected $hidden = [
    'password', 'remember_token',
];

public function admin()
{
    return $this->hasMany(Admin::class, 'user_id', 'id');
}

public function teacher()
    {
        return $this->hasMany(Admin::class, 'user_id', 'id');
    }

    public function student()
    {
        return $this->hasMany(Admin::class, 'user_id', 'id');
    }
    
}
