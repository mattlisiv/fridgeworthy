@extends('static.staticmaster')

@section('content')
    @include('administrator.partials.navbar')
        <div class="row">
            <div class="col-lg-8">
                 <h1>{{$reward->name}}</h1>
                 @if(!is_null($reward->getFilePath()))
                    <p><img src="{{$reward->getFilePath()}}" alt="No image found"></p>
                @else
                    <p>No image provided</p>
                @endif
                <br>
                <p> No statistics provided for {{$reward->name}}</p>
                <br>
                <a href="{{action('Admin\RewardController@index') }}"> <h6>Back to Reward Management</h6></a>
            </div>
            <div class="col-lg-3 col-lg-offset-1" style="padding-top:50px">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Reward</div>
                    <div class="panel-body">
                        {!! Form::open(['action'=>['Admin\RewardController@edit',$reward->id], 'method' => 'GET']) !!}
                        {!! Form::submit('Edit Reward',['class' => 'btn btn-primary form-control']) !!}
                        {!! Form::close() !!}
                        <br>
                        {!! Form::open(['action'=>['Admin\RewardController@destroy',$reward->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete Reward',['class' => 'btn btn-danger form-control']) !!}
                        {!! Form::close() !!}    
                    </div>
                </div>
            </div>
        </div>
    @include('errors.list')
@endsection
