@extends('layouts.app', ['activePage' => 'evaluation', 'title' => 'Peformance Evaluation', 'navName' => 'Evalaution'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Peformance Evaluation Scores</h4>
                            <!-- <a class="btn btn-success" href="{{ route('scores.create') }}"> Create New Score</a> -->

                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>

                        

                        <ul class="nav navbar-nav navbar-right">
                            <form style="color:green" method="get" action="employee_performance/created_at" class="form-inline">
                            {{csrf_field()}}
                            
                                <input style="color:green" type="text" placeholder="Enter Date format('Y-m-d') " name="Date" class="form-control" required>
                                <input  style="color:green" type="submit" value="Search" class="btn btn-primary">
                            </form>
                        </ul>


                        
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <!-- <th>Id</th> -->
                                    <th>Employee Name</th>
                                    <th>Total Score</th>
                                    <th>Date</th>
                                    <th> Actions</th>
                          
                                    
                                    <!-- <th>Actions</th> -->
                                </thead>
                                <tbody>
                                    
                                @foreach( $scores as $score )
                                    <tr>
                                        <!-- <td>{{$score->id}}</td> -->
                                        <td>{{$score->name}}</td>
                                        <!-- <td>{{$score->Section_name}}</td> -->
                                        <td>{{$score->sum}}</td>
                                        <td>{{$score->created_at}}

                                        <td> 
                                            <a  class="btn btn-info " href="{{ route('evaluation.show',$score->user_id) }}">View</a>
                                            <a  class="btn btn-primary" href="{{ route('evaluation.edit',$score->user_id) }}">Edit</a> 
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