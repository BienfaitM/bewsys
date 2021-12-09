@extends('layouts.app', ['activePage' => 'Scores', 'title' => 'Score', 'navName' => 'Scores'])


@section('content')
<div class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Score</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Score:</strong>
            {{$scores->Score_Name}}
        </div>
    </div>
</div>
<div class="card-body table-full-width table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <th>Score Id</th>
            <th>Score Name</th>
            <th>Description</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr> 
                <td>{{$scores->id}}</td>
                <td>{{$scores->Score_Name}}</td>
                <td>{{$scores->Description}}</td> 
                <td>{{$scores->Values}}</td>  

    
            </tr>

       </tbody>

       

    </table>
</div>


</div>
</div>
</div>
@endsection