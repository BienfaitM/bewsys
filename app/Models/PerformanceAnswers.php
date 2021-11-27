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


}
