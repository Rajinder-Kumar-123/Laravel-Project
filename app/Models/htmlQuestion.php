<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class htmlQuestion extends Model
{
    use HasFactory;
    protected $table= "html_questions";

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

    public function htmlAnswers(){
        return $this->hasMany(htmlAnswer::class, 'ans_id', 'id');
    }
}
