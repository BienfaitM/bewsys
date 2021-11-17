@extends('layouts.app', ['activePage' => 'sections', 'title' => 'Sections', 'navName' => 'Sections'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Sections</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Id</th>
                                    <th>Section Name</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                @foreach( $sections as $section )
                                    <tr>
                                        <td>{{$section->id}}</td>
                                        <td>{{$section->Section_Name}}</td>
                                        <td> Edit</td>  
                         
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