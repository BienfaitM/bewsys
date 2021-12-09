@extends('layouts.app', ['activePage' =>' Score Management', 'title' => 'Scores', 'navName' => 'Score Management'])

@section('content')
<div class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Edit Score</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('scores.index') }}"> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <label class="col-sm-2 col-form-label">Whoops!</label> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<form action="{{route('scores.update',$scores->Score_Name)}}" method="POST">
@csrf
@method('PUT')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Score Name:</label>
            <input type="text" name="Score_Name" value="{{$scores->Score_Name}}" class="form-control" placeholder="Score Name">
        </div>
    </div>
    <div class = "col-xs-12 col-sm-12 col-md-12">
    
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Score Value:</label>
            <input type="text" name="Score Value" value="{{$scores->Values}}" class="form-control" placeholder="Score Value">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Description:</label>
            <input type="text" name="Score Description" value="{{$scores->Description}}" class="form-control" placeholder="Score Description">
        </div>
    </div>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


</div>
</div>












@endsection