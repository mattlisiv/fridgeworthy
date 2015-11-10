@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li><a href="{{action('Admin\DistrictController@index') }}">District Management</a></li>
                <li class="active">{{$district->name}}</li>
            </ol>
            <h1>{{$district->name}}</h1>
                @if(count($district->regions))
                <p>Current active regions in {{$district->name}}:</p>
                    <ul class="list-group">
                        @foreach($district->regions as $region)
                            <li class="list-group-item"><a href="{{action("Admin\RegionController@show",$region->id)}}">{{$region->name}}</a></li>
                        @endforeach
                    </ul>
                @else
                    <p>No active regions in this district.</p>
                    @endif
            <br>
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">Edit District</div>
                    <div class="panel-body"> 
                    {!! Form::open(['action'=>['Admin\DistrictController@edit',$district->id], 'method' => 'GET']) !!}
                    {!! Form::submit('Edit District',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                    <br>
                    <button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#deleteModal"> Delete District</button>
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
                            <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this district? </h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                By deleting this district, you will be deleting all associated regions,schools and classes.
                                Please confirm you want to do this a database administrator.
                            </p>
                        </div>
                        <div class="modal-footer">
                            {!! Form::open(['action'=>['Admin\DistrictController@destroy',$district->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
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

