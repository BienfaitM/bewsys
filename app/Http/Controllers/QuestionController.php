<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Section;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $questions = Question::with('section')->orderBy('id', 'ASC')->get();
        return view('questions.index',compact('questions'));
        // return response()->json($questions);

    }

    public function perfomance()
    {
    
        $questions = Question::with('section','scores')->orderBy('id', 'ASC')->get();

        return view('peformance_evaluation.questions',compact('questions'));
        
        // return response()->json($questions);



    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //    $sections = Section::orderBy('id', 'ASC')->get();
        $sections = Section::pluck('Section_Name', 'id');

        return view('questions.create',compact('sections'));
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
            // 'Description' => 'required',
            'Score_Category' => 'required',
            'Section_id' => 'required',
        ]);
       
        $question = new Question;
        // $question->Description = $request->Description;
        $question->Score_Category = $request->Score_Category;
        $question->Section_id = $request->Section_id;
        try{
            $question->save();
            return redirect()->route('questions.index');
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
        $question = Question::find($id);
        $sections = Section::pluck('Section_Name', 'id');
        return view('questions.show',compact('question'));


    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = Question::find($id);
        $sections = Section::find('Section_Name','id');
    
        return view('questions.edit',compact('questions','sections'));
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
         $request->validate([
            'Description' => 'required',
            'Score_Category' => 'required',
            'Section_id' => 'required',
        ]);
       
        $question = Question::whereId($request->id)->first();
        $question->Description = $request->Description;
        $question->Score_Category = $request->Score_Category;
        $question->Section_id = $request->Section_id;

        try{
           $question->save();
            return response()->json($question);
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
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->route('questions.index');
    }
}


