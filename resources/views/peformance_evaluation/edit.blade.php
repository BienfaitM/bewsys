@extends('layouts.app', ['activePage' => 'evalaution', 'title' => 'Peformance Evaluation', 'navName' => 'Evalaution'])


@section('content')
<div class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Edit Report </h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('evaluation.index') }}"> Back</a>
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

<form action="{{route('performance_answers.update',$performance_answers->Score_value)}}" method="POST">
@csrf
@method('PUT')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Score Value:</label>
            <input type="text" name="Section_Name" value="{{$performance_answers->Score_value}}" class="form-control" placeholder="Section Name">
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
