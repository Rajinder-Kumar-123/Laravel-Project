<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table= "category";

    public function multipleChoice(){
        return $this->belongsTo(question::class, 'user_id', 'id');
    }
    public function shortChoice(){
        return $this->belongsTo(question::class, 'user_id', 'id');
    }
    public function longChoice(){
        return $this->belongsTo(question::class, 'user_id', 'id');
    }
}
