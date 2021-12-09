<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerformanceAnswers;
use App\Models\Question;
use App\Models\User;

use Auth;
use DB;



class PerformanceAnswersController extends Controller
{


    public function display_users_scores(){


        $scores = PerformanceAnswers::groupBy('user_id')
        // ->select('performance_answers.created_at')
        ->join('users','performance_answers.user_id','users.id')
        // ->join('sections','performance_answers.Section_id','sections.id')
        ->selectRaw('sum(Score_value) as sum, name,user_id')

        ->get();
     
        // return response()->json($scores);
        
        return view('peformance_evaluation.admin',compact('scores'));

    }




    public function individualscores($id)
    {


        $scores = PerformanceAnswers::groupBy('user_id','Section_id')
        ->where('performance_answers.user_id',$id)
        ->join('users','performance_answers.user_id','users.id')
        ->join('sections','performance_answers.Section_id','sections.id')
        ->selectRaw('sum(Score_value) as sum, name,Section_name')
        ->distinct('Question_id')
        ->get();
     

        return view('peformance_evaluation.admin',compact('scores'));




    
    }
    public function display_section_scores(){
        $scores = PerformanceAnswers::groupBy('Question_id')
        ->join('questions','performance_answers.Question_id','Question_id')
        ->selectRaw('Score_value')
        ->distinct('user_id')
        ->get();
        
        return view('peformance_evaluation.admin',compact('scores'));

    }


      //get total score per Employee
      public function total_scores($user_id){
        $user_total_scores = User::find($user_id)->performance_answers->sum('Score_value');
        return $user_total_scores;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $questions = PerformanceAnswers::whereuser_id(Auth()->user()->id)->with('scores')->orderBy('id', 'ASC')->get();
         
    //     return response()->json($questions);
          
    // }


    public function index()
    {

        $questions = DB::table('performance_answers')
        ->join('scores','performance_answers.Score_value','scores.id')
        ->select('Question_id', DB::raw('count(*) as total'))
        ->groupBy('Question_id')
        ->get();

    }


  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::with('section','scores')->orderBy('id', 'ASC')->get();

        return view('peformance_evaluation.create',compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'Score_value' => 'required',
        ]);
       
        $scores = new PerformanceAnswers;
        $scores->user_id = Auth()->user()->id;
        $scores->Section_id = $request->Section_id;
        $scores->Question_id = $request->Question_id;
        $scores->Score_value = $request->Score_value;
        try{
            $scores->save();
            return response()->json($scores);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        return view('peformance_evaluation.show',compact('scores'));
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
