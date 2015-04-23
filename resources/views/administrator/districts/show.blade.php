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
             <a href="{{action('Admin\DistrictController@index') }}"> <h6>Back to District Management</h6></a>
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">Edit District</div>
                    <div class="panel-body"> 
                    {!! Form::open(['action'=>['Admin\DistrictController@edit',$district->id], 'method' => 'GET']) !!}
                    {!! Form::submit('Edit District',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['action'=>['Admin\DistrictController@destroy',$district->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete District',['class' => 'btn btn-danger form-control']) !!}
                    {!! Form::close() !!}         
                </div>
            </div>
       </div>
    </div>
    @include('errors.list')
@endsection

