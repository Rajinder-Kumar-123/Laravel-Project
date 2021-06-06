<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class javascriptQuestion extends Model
{
    use HasFactory;
    protected $table= "javascript_questions";

    public $timestamps= true;

    protected $fillable= [
        'name',
        'category',
        'option1',
        'option2',
        'option3',
        'option4',
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

    public function javascriptAnswers(){
        return $this->hasMany(javascriptAnswer::class, 'ans_id', 'id');
    }
}
