<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class javascriptAnswer extends Model
{
    use HasFactory;
    public function javascriptQuestion(){
        return $this->belongsTo(javascriptQuestion::class, 'ans_id', 'id');
    }
}
