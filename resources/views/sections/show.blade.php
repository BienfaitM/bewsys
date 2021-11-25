@extends('layouts.app', ['activePage' => 'Sections', 'title' => 'Section', 'navName' => 'Sections'])


@section('content')
<div class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Section</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Section:</strong>
            {{$sections->Section_Name}}
        </div>
    </div>
</div>
<div class="card-body table-full-width table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <th>Question Id</th>
            <th>Question Category</th>
            <th>Description</th>
        </thead>
        <tbody>
            @foreach($sections as $section)
                @foreach($questions as $question)
                    <tr> 
                        <td>{{$question->id}}</td>
                        <td>{{$question->Question_Category}}</td>
                        <td>{{$question->Description}}</td>         
                    </tr>
                @endforeach
        </tbody>
        @endforeach

    </table>
</div>


</div>
</div>
</div>
@endsection