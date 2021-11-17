@extends('layouts.app', ['activePage' => 'departments', 'title' => 'Departments', 'navName' => 'Departments'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Departments</h4>
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
                                        <td> Edit</td>  
                         
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