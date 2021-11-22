@extends('layouts.app', ['activePage' => 'Scores', 'title' => 'Scores', 'navName' => 'Scores'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('scores.store')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" >
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Score') }}</h4>
                <p class="card-category"></p>
              </div>

              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('scores.index')}}" class="btn btn-sm btn-outline-success">{{ __('Back') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Score Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="Score_Name" id="input-name" type="text" placeholder="{{ __('Score Name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
               <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Score Value') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="Values" id="input-name" type="text" placeholder="{{ __('Value') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Question') }}</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="Question_id">
                        <option></option>
                        @foreach ($questions as $question=> $value)
                            <option value="{{ $question}}" {{ ( $question) ? 'selected' : '' }}> 
                                {{ $value }} 
                            </option>
                        @endforeach    
                    </select>
                  </div>
                </div>

                <br>

              
                                 
              </div>
             <div class="card-footer ml-auto mr-auto">
                <!-- {{-- <button type="submit" class="btn btn-warning btn-block">{{ __('Add') }}</button> --}} -->
                <button type="submit" class="btn btn-warning btn-block ">
                  {{ __('Add')}}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection