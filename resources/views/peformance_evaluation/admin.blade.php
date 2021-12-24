@extends('layouts.app', ['activePage' => 'evaluation', 'title' => 'Peformance Evaluation', 'navName' => 'Evalaution'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Peformance Evaluation Scores</h4>
                            <div class="pull-right">
                    <a class="btn btn-secondary" href="{{ route('export-pdf') }}"> Download</a>
                </div>

                        </div>

                   
                        
                        <div class="card-body table-full-width table-responsive">
                            <table id="evaluation_table" class="table table-hover table-striped">
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
                                            <a  class="btn btn-success" href="{{ route('summary-pdf',$score->user_id) }}">Download</a> 

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

    <script>
    $(document).ready(function() {
        $('#evaluation_table').DataTable();
    });
</script>
@endsection