@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="jumbotron">
            <h2>{{$user->name}}</h2>
            <p>You have {{$user->questions->count()}} question(s) and {{$user->answers->count()}} answer(s).</p>
            <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
          </div>
            <div class="panel panel-default">
                <div class="panel-heading">Profile Information:</div>
                <div class="panel-body">
                    Email: {{$user->email}}<br/>
                    City: {{$user->city}}<br/>
                    Country: {{$user->country}}<br/>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
