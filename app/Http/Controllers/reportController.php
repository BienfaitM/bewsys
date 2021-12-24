<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerformanceAnswers;
use App\Models\Question;
use App\Models\User;

use Auth;
use DB;
use PdfReport;


class reportController extends Controller
{
    public function show($id)
    {
        $scores = PerformanceAnswers::groupBy('user_id','Section_id','created_at')
        ->where('performance_answers.user_id',$id)
        ->select('performance_answers.created_at')
        ->join('users','performance_answers.user_id','users.id')
        ->join('sections','performance_answers.Section_id','sections.id')
        ->selectRaw('sum(Score_value) as sum, name,Section_name')
        ->distinct('Question_id')
        ->get();
        // return response()->json($scores);
        
     
    }
}
