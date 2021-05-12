<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
    ];

    public function admin()
    {
        return $this->belongsTo(registerModel::class, 'user_id', 'id');
    }
    public function teacher()
    {
        return $this->belongsTo(registerModel::class, 'user_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo(registerModel::class, 'user_id', 'id');
    }
}
