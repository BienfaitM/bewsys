@extends('layouts.app', ['activePage' => 'department', 'title' => 'Departments', 'navName' => 'Departments'])


@section('content')
<div class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Department</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('departments.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{$department->Department_Name}}
        </div>
    </div>
   
 
</div>
</div>
</div>
@endsection