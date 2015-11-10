@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')
    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li><a href="{{action('Admin\RegionController@index') }}">Region Management</a></li>
                <li class="active">{{$region->name}}</li>
            </ol>
             <h1>{{$region->name}}</h1>
             <p>No statistics provided for {{$region->name}}</p>
             <a href="{{action('Admin\RegionController@index') }}"> <h6>Back to Region Management</h6></a>
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Region</div>
                <div class="panel-body">
                    {!! Form::open(['action'=>['Admin\RegionController@edit',$region->id], 'method' => 'GET']) !!}
                    {!! Form::submit('Edit Region',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                    <br>
                    <button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#deleteModal"> Delete Region</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="delete">
            <div class="modal-content">
                <div class="modal-content">
                    <div>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this region? </h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                By deleting this region, you will be deleting all associated schools and classes.
                                Please confirm you want to do this a database administrator.
                            </p>
                        </div>
                        <div class="modal-footer">
                            {!! Form::open(['action'=>['Admin\RegionController@destroy',$region->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete Region',['class' => 'btn btn-danger']) !!}
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('errors.list')
@endsection
