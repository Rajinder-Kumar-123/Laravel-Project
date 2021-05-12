<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="student";

    protected $fillable = [
        'name',
        'email',
        'password',
        're_password',
        'user_id', 
    ];

    public function register()
    {
        return $this->belongsTo(registerModel::class, 'user_id', 'id');
    }
}
