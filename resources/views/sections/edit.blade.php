@extends('layouts.app', ['activePage' => 'Section Management', 'title' => 'Sections', 'navName' => 'Section Management'])

@section('content')
<div class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Section</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('sections.index') }}"> Back</a>
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


<form action="{{route('sections.update',$section->Section_Name)}}" method="POST">
@csrf
@method('PUT')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Section Name:</label>
            <input type="text" name="Section_Name" value="{{$section->Section_Name}}" class="form-control" placeholder="Section Name">
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