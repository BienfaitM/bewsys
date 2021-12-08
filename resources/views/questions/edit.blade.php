@extends('layouts.app', ['activePage' => 'Question Management', 'title' => 'Questions', 'navName' => 'Question Management'])

@section('content')
<div class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
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

<form action="{{route('questions.update',$questions->Score_Category)}}" method="POST">
@csrf
@method('PUT')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Question Name:</label>
            <input type="text" name="Score_Category" value="{{$questions->Score_Category}}" class="form-control" placeholder="Section Name">
        </div>
    </div>
    <div class = "col-xs-12 col-sm-12 col-md-12">
<div class="row">
    <div class ="col-xs-12 col-sm-12 col-md-12">
        <div class= "form-group">
            <label class="col-sm-2 col-form-label">{{ __('Section') }}</label>
            <div class="col-sm-7">
                    <select class="form-control" name="Section_id">
                        <option></option>
                            <option value="{{$questions}}" {{ ( $sections) ? 'selected' : '' }}> 
                                {{ $sections }} 
                            </option>
                    </select>
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