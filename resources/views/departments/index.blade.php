@extends('layouts.app', ['activePage' => 'departments', 'title' => 'Departments', 'navName' => 'Departments'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Departments</h4>
                            <a class="btn btn-success" href="{{ route('departments.create') }}"> Create New Departments</a>

                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Id</th>
                                    <th>Department Name</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                @foreach( $departments as $department )
                                    <tr>
                                        <td>{{$department->id}}</td>
                                        <td>{{$department->Department_Name}}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('departments.show',$department->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('departments.edit',$department->id) }}">Edit</a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['departments.destroy', $department->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                        </td>
                         
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
@endsection