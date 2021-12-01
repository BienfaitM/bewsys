@extends('layouts.app', ['activePage' => 'scores', 'title' => 'Scores', 'navName' => 'Scores'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Scores</h4>
                            <a class="btn btn-success" href="{{ route('scores.create') }}"> Create New Score</a>

                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Id</th>
                                    <th>Score Name</th>
                                    <th>Score Value</th>
                                    <th>Question</th>
                                    
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                @foreach( $scores as $score )
                                    <tr>
                                        <td>{{$score->id}}</td>
                                        <td>{{$score->Score_Name}}</td>
                                        <td>{{$score->Values}}</td>
                                        <td>{{$score->question->Score_Category}}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('scores.show',$score->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('scores.edit',$score->id) }}">Edit</a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['scores.destroy', $score->id],'style'=>'display:inline']) !!}
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