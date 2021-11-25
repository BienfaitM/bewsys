@extends('layouts.app', ['activePage' => 'Questions', 'title' => 'Questions', 'navName' => 'Questions'])


@section('content')
<div class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Question</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Section Name:</strong>
            {{$question->section->Section_Name}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Question Category:</strong>
            {{$question->Question_Category}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{$question->Description }}
        </div>
    </div>
</div>
</div>
</div>
@endsection