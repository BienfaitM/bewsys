<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;


    public function section()
    {
        return $this->hasOne('App\Models\Section', 'id', 'Section_id');
        
    }

    public function scores()
    {
        return $this->hasMany('App\Models\Score', 'Question_id', 'id');
    }



}
