@extends('layouts.app', ['activePage' => 'evalaution', 'title' => 'Peformance Evaluation', 'navName' => 'Evalaution'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Peformance Evaluation</h4>
                            <!-- <a class="btn btn-success" href="{{ route('scores.create') }}"> Create New Score</a> -->

                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                   
        
                            <table class="table table-hover table-striped">
                                <thead>
                                    <!-- <th>Id</th>
                                    <th>Questions</th>
                                    <th>Section</th>
                                    <th class="pull-right">Scores</th> -->
                                    
                                    <!-- <th>Actions</th> -->
                                </thead>
                                <tbody>
                                <form method="post" action="{{route('evaluation.store')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" >
            @csrf
            @method('post')
                                @foreach( $questions as $question )
                      

                                <tr>
                                    <td>{{$question->section->Section_Name}}</td>   
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
</tr>
                                    <tr>
                                
                                    <td></td>
                                    @foreach ($question->scores as $score)  
                                  
                                    <td> 
                    <input type="checkbox" name="Score_value" value="{{$score->id}}">  {{$score->Score_Name}} 
           


                            
                                    </td>    @endforeach  
                                    </tr>
                                    
<tr>
<td></td>
@foreach ($question->scores as $score)  
<td> 
{{$score->Values}} 
                                    </td>    @endforeach  

</tr>

<tr>
<td>{{$question->Question_Category}}</td>
@foreach ($question->scores as $score)  
<td>
{{$score->Description}} 
                                    </td>    @endforeach  
</tr>
    
                                </tbody>
                                @endforeach
                  
                            </table>
                                      
               
                <button type="submit" class="btn btn-warning btn-block">{{ __('Submit') }}</button> 
                <!-- <button type="submit" class="btn btn-warning btn-block ">
                  {{ __('Submit')}}
                </button> -->

</form>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
@endsection