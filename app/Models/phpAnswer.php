<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phpAnswer extends Model
{
    use HasFactory;

    public function phpQuestion(){
        return $this->belongsTo(phpQuestion::class, 'ans_id', 'id');
    }
}
