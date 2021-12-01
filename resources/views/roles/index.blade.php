@extends('layouts.app', ['activePage' => 'Roles', 'title' => 'BEWSYS', 'navName' => 'Role Management'])
@section('content')

<div class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="card-body table-full-width table-responsive">
        <div class="pull-left">
            <h4>Roles</h4>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="card-body table-full-width table-responsive">
<table class="table table-hover table-striped">
<thead>
  <tr>
     <th>No</th>
     <th>Name</th>
     <th>Action</th>
  </tr>
</thead>
<tbody>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>



{!! $roles->render() !!}
</div>
</div>
@endsection