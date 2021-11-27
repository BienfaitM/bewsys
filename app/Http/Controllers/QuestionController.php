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
            'Question_Category' => 'required',
            'Section_id' => 'required',
        ]);
       
        $question = new Question;
        // $question->Description = $request->Description;
        $question->Question_Category = $request->Question_Category;
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
        $section = Question::find($id)->section;
        return view('questions.show',compact('question'));


    }
    // public function section_info($id){
    //     $section = Section::find($id)->question;
    //     $Section_Name = Section::find($id)->Section_name;
    //     return response()->json([$section,$Section_Name]);
    //     // $Description = Question::find($question_id)->Description;
    //     // $Question_Category = Question::find($question_id)->Question_Category;
    //     // return response()->json([$question,$Description,$Question_Category]);

    // }
    /*
    public function question_section($id){
        $question_section = Question::find($id)->sections;
        return $question_section;
    }
    public function display_question_section(){

        $question = Question::all();
        foreach($question_id as $s){
            $question_s = $this->question_section($s->id);

        }
        $all_question = section::all()->get('Section_Name');
        return response()->json([$question_id,$all_question]);
    }
    public function question_info($question_id){
        $question = Question::find($question_id)->sections->get();
        $Description = Question::find($question_id)->Description;
        $Question_Category = Question::find($question_id)->Question_Category;
        return response()->json([$question,$Description,$Question_Category]);

    }
    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = Question::find($id);
        // return view('questions.edit',compact('questions'));
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
            'Question_Category' => 'required',
            'Section_id' => 'required',
        ]);
       
       $question = Question::whereId($request->id)->first();
        $question->Description = $request->Description;
        $question->Question_Category = $request->Question_Category;
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


