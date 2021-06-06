<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class htmlAnswer extends Model
{
    use HasFactory;

    public function htmlQuestion(){
        return $this->belongsTo(htmlQuestion::class, 'ans_id', 'id');
    }
}
