@extends('layouts.app')
@section('content')
<div class="jumbotron" style="background-color: #3097d1;">
  <h2><b class="label label-danger">{{$question->title}}</b>
    &nbsp;
    <b class="label label-info">Has {{count($question->answers)}} answer(s).</b></h2>
    <p>Asked by {{$question->user->name}}</p>
    <p style="color: white;">{!!$question->description!!}</p>
    <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
</div>
<div class="fluid">

  <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #ddd;">
      <b>{{$answer->user->name}}</b><br/>
      Posted at {{$answer->created_at}}
    </div>
    <div class="panel-body">
          <div>
            {!!$answer->description!!}
          </div>
          <div class="interaction" data-ansId="{{$answer->id}}">
            <span>{{$answer->likes->where('like','1')->count()}}</span>&nbsp;&nbsp;
            <a class="like label {{$answer->likes->where('user_id',Auth::user()->id)->where('like','1')->first()?'label-primary':'label-default'}}" data="true" href="#"><i class="fa fa-thumbs-up" title="Like"></i></a>&nbsp;&nbsp;&nbsp;
            <span>{{$answer->likes->where('like','0')->count()}}</span>&nbsp;&nbsp;
            <a class="like label {{$answer->likes->where('user_id',Auth::user()->id)->where('like','0')->first()?'label-primary':'label-default'}}" data="false" href="#"><i class="fa fa-thumbs-down" title="Dislike"></i></a>&nbsp;&nbsp;
            @if(Auth::user()->id==$answer->user_id || Auth::user()->role_id==1)
              <a href="{{ route('answers.edit',[$answer->id]) }}" class="label label-default"><i class="fa fa-edit" title="Edit"></i></a>&nbsp;&nbsp;
              <a href="#" onclick="if(confirm('Are you sure you wish to delete this Answer?')){event.preventDefault();document.getElementById('delete-form-{{$answer->id}}').submit();}" class="label label-default"><i class="fa fa-trash" title="Delete" aria-hidden="true"></i></a>
              <form id="delete-form-{{$answer->id}}" action="{{route('answers.destroy',[$answer->id])}}" method="post" style="display:none;">
                <input type="hidden" name="_method" value="delete">
                {{csrf_field()}}
              </form>
            @endif
          </div>
    </div>
  </div>


  <div class="panel panel-primary">
    <div class="panel-heading">
      Give Answer
    </div>
    <div class="panel-body">
      <form action="{{route('answers.store')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="question_id" value="{{$question->id}}">
        <div class="form-group">
          <label for="editor">Answer<span class="required">*</span></label>
          <textarea name="description" id="editor" style="resize: vertical;" placeholder="Question" class="form-control" rows="3" spellcheck="false" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Post Answer</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  var token='{{Session::token()}}';
  var urlLike="{{route('likes.likeit')}}";
</script>
@endsection
