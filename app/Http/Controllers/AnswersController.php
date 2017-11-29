<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Auth::check()){
        $question=Question::where('id',$request->input('question_id'))->first();
        if($request->input('description')==null || $request->input('description')==""){
          return back()->withInput()->with('errors','Answer could not be added !');
        }
        $answer=Answer::create([
          'description'=>$request->input('description'),
          'question_id'=>$question->id,
          'user_id'=>Auth::user()->id
        ]);
        if($answer){
          return redirect()->route('questions.show',['quistion'=>$question->id])->with('success','Answer added successfully !');
        }
        return back()->withInput()->with('errors','Answer could not be added !');
      }
      return back()->withInput()->with('errors','Sorry you are not logged in !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
      $answer=Answer::where('id',$answer->id)->first();
      $question=$answer->question;
      return view('answers.show',['answer'=>$answer,'question'=>$question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
      $answer=Answer::where('id',$answer->id)->first();
      return view('answers.edit',['answer'=>$answer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
      $answerUpdate=Answer::where('id',$answer->id)->update([
          'description'=>$request->input('description')
        ]);
        if($answerUpdate){
          return redirect()->route('answers.show',['answer'=>$answer->id])->with('success','Answer updated successfully !');
        }
        // redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
      $findanswer=Answer::find($answer->id);
      $question=$findanswer->question;
      Like::where('answer_id',$answer->id)->delete();
      if($findanswer->delete()){
        return redirect()->route('questions.show',['question'=>$question->id])->with('success','Answer deleted successfully !');
      }
      return back()->withInput()->with('errors','Answer could not be deleted !');
    }
}
