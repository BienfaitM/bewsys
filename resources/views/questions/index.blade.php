@extends('layouts.app', ['activePage' => 'questions', 'title' => 'Questipns', 'navName' => 'Questions'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Perfomance Questions</h4>
                            <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('questions.create') }}"> Create New Questions</a>
                </div>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <!-- <th>Id</th>
                                    <th>Question</th> -->
                                     <th>Question Category</th>
                                     <th>Section</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                @foreach( $questions as $question )
                                    <tr>
                                        <!-- <td>{{$question->id}}</td>
                                        <td>{{$question->Description}}</td> -->
                                        <td>{{$question->Score_Category}}</td>
                                        <td>{{$question->section->Section_Name}}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('questions.edit',$question->id) }}">Edit</a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['questions.destroy', $question->id],'style'=>'display:inline']) !!}
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