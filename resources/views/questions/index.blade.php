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
                            <table id="performance_table" class="table">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'Question Category'},
            {data: 'email', name: 'Section'},
            {data: 'action', name: 'Actions', orderable: false, searchable: false},
        ]
    });
</script>

@endsection
