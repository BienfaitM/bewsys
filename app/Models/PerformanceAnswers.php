<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceAnswers extends Model
{
    use HasFactory;

    public function scores()
    {
        return $this->hasOne('App\Models\Score', 'id', 'Score_value');
        
    }


    public function questions()
    {
        return $this->hasOne('App\Models\Question', 'id', 'Question_id');
        
    
    }


    public function sections()
    {
        return $this->hasOne('App\Models\Section', 'id', 'Section_id');
        
    }


}
