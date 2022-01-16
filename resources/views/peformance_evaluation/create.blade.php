@extends('layouts.app', ['activePage' => 'evalaution', 'title' => 'Peformance Evaluation', 'navName' => 'Evalaution'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        <form method="post" action="{{route('evaluation.store')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" >
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <!-- <h4 class="card-title">{{ __('Add Score') }}</h4> -->
                <p class="card-category"></p>
              </div>

              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('scores.index')}}" class="btn btn-sm btn-outline-success">{{ __('Back') }}</a>
                  </div>
                </div>

                @foreach( $questions as $question )

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Question No:') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="input-name"  name="Question_id" type="text" value="{{$question->id}}" required="true" aria-required="true" readonly/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Section Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="input-name" name="Section_Name" type="text" value="{{$question->section->Section_Name}}" required="true" aria-required="true" readonly/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Question:') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  id="input-name" type="text" value="{{$question->Score_Category}}" required="true" aria-required="true" readonly/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>



                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Score') }}</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="Score_value">
                        <option></option>
                        @foreach ($question->scores as $score) 
                            <option value="{{$score->Values}} " {{ ( $score->Score_Name) ? 'selected' : '' }}> 
                            {{$score->Score_Name}} :Value = {{$score->Values}}  
                            </option>
                        @endforeach    
                    </select>
                  </div>
                </div>
<br>
@endforeach  
             
                <br>

              
                                 
              </div>
             <div class="card-footer ml-auto mr-auto">
                <!-- {{-- <button type="submit" class="btn btn-warning btn-block">{{ __('Add') }}</button> --}} -->
                <button type="submit" class="btn btn-warning btn-block ">
                  {{ __('Submit')}}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection