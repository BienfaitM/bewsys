@extends('layouts.app', ['activePage' => 'department', 'title' => 'Departments', 'navName' => 'Departments'])
@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <!-- <h2>Edit Product</h2> -->
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('departments.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{route('departments.update',$departments->Department_Name)}}" method="POST">
    	@csrf
        @method('PUT')

         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Department Name:</strong>
		            <input type="text" name="Department_Name" value="{{$departments->Department_Name}}" class="form-control" placeholder="Department Name">
                    
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>
@endsection