@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')


    <h1>{{$district->name}}</h1>

    <article>
        Current active regions in {{$district->name}}

        @foreach($district->regions as $region)
            <ul class="list-group">
                <li class="list-group-item"><a href="{{action("RegionController@show",$region->id)}}">{{$region->name}}</a></li>
            </ul>
            @endforeach

        {!! Form::open(['action'=>['DistrictController@edit',$district->id], 'method' => 'GET']) !!}
        {!! Form::submit('Edit District',['class' => 'btn btn-primary form-control']) !!}
        {!! Form::close() !!}
        <br>
        {!! Form::open(['action'=>['DistrictController@destroy',$district->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('Delete District',['class' => 'btn btn-danger form-control']) !!}
        {!! Form::close() !!}

        <a href="{{action('DistrictController@index') }}"> <h6>Back to District Management</h6></a>
    </article>

    @include('errors.list')
@endsection

