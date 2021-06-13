<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $table= "question";

    public $timestamps= true;

    protected $fillable= [
        'name',
        'category',
        'option1',
        'option2',
        'option3',
        'option4',
        'ans_id',
        'answer',
        'allQuestions',
    ];
    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['category'] = json_decode($value);
    }
    public function multipleChoice(){
        return $this->hasMany(category::class, 'user_id', 'id');
    }
    public function shortChoice(){
        return $this->hasMany(category::class, 'user_id', 'id');
    }
    public function longChoice(){
        return $this->hasMany(category::class, 'user_id', 'id');
    }
    public function answers(){
        return $this->hasMany(Answer::class, 'ans_id', 'id');
    }
}
