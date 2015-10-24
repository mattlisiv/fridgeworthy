@extends('static.staticmaster')

@section('content')

    @include('administrator.partials.navbar')

    <script type="text/javascript" src="{{asset('js/admin/create_user.js')}}"></script>

    <h4>Edit {{$user->first_name}} {{$user->last_name}}'s Information</h4>
    {!! Form::model($user,['action'=>['Admin\UserController@update',$user->id],'method'=>'PATCH']) !!}
    @include('administrator.users.partials.editform',['submitButtonText'=> 'Edit User Information'])

    {!! Form::close() !!}
    <br>
    @include('errors.list')
    <br>
    <a href="{{action('Admin\UserController@show',[$user->id]) }}" class="btn btn-default">Back to user's information</a>
    <br>
    <br>
@endsection
<script type="text/javascript">
    var user_type = '{{get_class($user)}}';

    var user_status = '{{$user->status}}';

    @if(get_class($user) == 'App\Student')
        var grade = '{{$user->grade}}';
    @endif

</script>
