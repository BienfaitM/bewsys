<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Question;
use App\Models\Score;


class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = Score::orderBy('id', 'ASC')->get();

        return view('scores.index',compact('scores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

        public function create()
        {
        //    $sections = Section::orderBy('id', 'ASC')->get();
          $questions = Question::pluck('Question_Category', 'id')->all();
    
            return view('scores.create',compact('questions'));
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
            'Score_Name' => 'required',
            'Question_Id' => 'required',
            'Values' => 'required'
        ]);
        $score = Score::whereId($request->id)->first();
        $score->Score_Name= $request->Score_Name;
        $score->Values = $request->Values;
        $score->Question_Id =$request->Question_Id;
        try{
           $score->save();
            return response()->json($score);
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
        $score = Score::find($id);
        return response()->json($score);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $score = Score::find($id);
        // return view('score.edit',compact('scores'));
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
        $request->validate([
            'Score_Name' => 'required',
            'Question_Id' => 'required',
            'User_Id' => 'required',
            'Values' => 'required'
        ]);
        $score = Score::whereId($request->id)->first();
        $score->Score_Name= $request->Score_Name;
        $score->Values = $request->Values;
        $score->Question_Id =$request->Question_Id;
        $score->User_Id = $request->User_Id;
        try{
           $score->save();
            return response()->json($score);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $score = Score::findOrFail($id);
        $score->delete();
        return response()->json($score);
    }


}
