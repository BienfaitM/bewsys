<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->hasOne('App\Models\Question', 'id', 'Question_id','Score_Category');
    }

    public function performeAnswers(){
        return $this->belongsTo('App\Models\PerformanceAnswers', 'id','Score_value');
    }

}
