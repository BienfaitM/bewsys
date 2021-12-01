@extends('layouts.app', ['activePage' => 'user-management', 'title' => 'Users', 'navName' => 'User Management'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('users.store')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" >
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add User') }}</h4>
                <p class="card-category"></p>
              </div>

              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('users.index')}}" class="btn btn-sm btn-outline-success">{{ __('Back') }}</a>
                  </div>
                </div>

              
               <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email" id="input-name" type="email" placeholder="{{ __('Email') }}" required="true" aria-required="true"/>
                      @if ($errors->has('email'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="password" id="input-name" type="password" placeholder="{{ __('Password') }}" required="true" aria-required="true"/>
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Roles') }}</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="role_id">
                        <option></option>
                        @foreach ($roles as $role=> $value)
                            <option value="{{ $role}}" {{ ( $role) ? 'selected' : '' }}> 
                                {{ $value }} 
                            </option>
                        @endforeach    
                    </select>
                    </div>
                  </div>
                </div>

                                 
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