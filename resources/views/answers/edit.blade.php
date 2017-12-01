@extends('layouts.app')
@section('content')
<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
<div class="panel panel-primary">
  <div class="panel-heading">Edit Answer</div>
  <div class="panel-body">
    <form action="{{route('answers.update',[$answer->id])}}" method="post">
      {{csrf_field()}}
      <input type="hidden" name="answer_id" value="{{$answer->id}}">
      <input type="hidden" name="_method" value="put">
      <div class="form-group">
        <label for="question-title">Title<span class="required">*</span></label>
        <p>{{$answer->question->title}}</p>
      </div>
      <div class="form-group">
        <label for="editor">Answer Body<span class="required">*</span></label>
        <textarea name="description" id="editor" style="resize: vertical;" placeholder="Question" class="form-control" rows="3" spellcheck="false" required>{{$answer->description}}</textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update Answer</button>
      </div>
    </form>
  </div>
</div>
</div>
@endsection
