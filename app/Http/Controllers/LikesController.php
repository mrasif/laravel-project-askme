<?php

namespace App\Http\Controllers;

use App\Like;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function likeit(Request $request)
    {
      // return ['like','1','2'];
      $answer_id=$request['answer_id'];
      $isLike=$request['isLike']==='true';

      $update=false;
      $answer=Answer::find($answer_id);
      if(!$answer){
        return null;
      }
      $user=Auth::user();
      $like=$user->likes()->where('answer_id', $answer->id)->first();
      if($like){
        $already_like=$like->like;
        $update=true;
        if($already_like==$isLike){
          $like->delete();
          return ['remove',count($answer->likes->where('like','1')),count($answer->likes->where('like','0'))];
        }
      }
      else{
        $like=new Like();
      }
      // return $like->like;
      $like->like=$isLike;
      $like->user_id=$user->id;
      $like->answer_id=$answer_id;
      if($update){
        $like->update();
      }
      else{
        $like->save();
      }
      if($isLike){
        return ['like',count($answer->likes->where('like','1')),count($answer->likes->where('like','0'))];
      }
      else{
        return ['dislike',count($answer->likes->where('like','1')),count($answer->likes->where('like','0'))];
      }
      return null;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
