@extends('layouts.app')
@section('content')
<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
<div class="panel panel-primary">
  <div class="panel-heading">Questions</div>
  <div class="panel-body">
    <form action="{{route('questions.store')}}" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="question-title">Title<span class="required">*</span></label>
        <input type="text" class="form-control" id="question-title" name="title" placeholder="Title" required>
      </div>
      <div class="form-group">
        <label for="editor">Body<span class="required">*</span></label>
        <textarea name="description" id="editor" style="resize: vertical;" placeholder="Question" class="form-control" rows="3" spellcheck="false" required></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Ask Question</button>
      </div>
    </form>
  </div>
</div>
</div>
@endsection
