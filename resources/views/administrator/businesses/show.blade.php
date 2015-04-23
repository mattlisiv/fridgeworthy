@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li><a href="{{action('Admin\AdministratorController@index') }}">Administrative Home</a></li>
                <li><a href="{{action('Admin\BusinessController@index') }}">Business Management</a></li>
                <li class="active">{{$business->name}}</li>
            </ol>
             <h1>{{$business->name}}</h1>
            <article>
                No statistics provided for {{$business->name}}
                <a href="{{action('Admin\BusinessController@index') }}"> <h6>Back to Business Management</h6></a>
            </article>
        </div>
        <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px;">
            <div class="panel panel-default">
                 <div class="panel-heading">Edit Business</div>
                <div class="panel-body">
                    {!! Form::open(['action'=>['Admin\BusinessController@edit',$business->id], 'method' => 'GET']) !!}
                    {!! Form::submit('Edit Business',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['action'=>['Admin\BusinessController@destroy',$business->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete Business',['class' => 'btn btn-danger form-control']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
           

    @include('errors.list')
@endsection
