@extends('layouts.app')
@section('content')
<div class="jumbotron" style="background-color: #3097d1;">
  <h2><b class="label label-danger">Questions Bank</b></h2>
  <p style="color:white;">Here you can find many questions about different events.</p>
  <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
</div>
<div class="fluid">
  @foreach($questions as $question)
  <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #ddd;">
      <b>{{ $question->title }}</b><br/>
      Asked at {{$question->created_at}}, Has {{count($question->answers)}} answer(s).
      &nbsp;Asked by <a href="{{route('users.show',[$question->user->id])}}">{{$question->user->name}}</a>
    </div>
    <div class="panel-body">
      <p>{!!$question->description!!}</p>
      <a href="{{ route('questions.show',[$question->id]) }}" class="btn btn-danger">View Answer</a>
    </div>
  </div>
  @endforeach
</div>
@endsection
