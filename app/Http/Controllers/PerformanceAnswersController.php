<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerformanceAnswers;
use App\Models\Question;
use Auth;



class PerformanceAnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = PerformanceAnswers::whereuser_id(Auth()->user()->id)->with('scores')->orderBy('id', 'ASC')->get();
         
        return response()->json($questions);
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::with('section','scores')->orderBy('id', 'ASC')->get();

        return view('peformance_evaluation.questions',compact('questions'));
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
        //
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
