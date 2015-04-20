@extends('static.staticmaster')

@section('content')
    @include('administrator.partials.navbar')
    <h1>Create a User</h1>

    {!! Form::open(['url'=>'users']) !!}
    @include('administrator.users.partials.form',['submitButtonText'=> 'Create User'])
    {!! Form::close() !!}
    <br>
    @include('errors.list')
    <br>
    <a href="{{action('Admin\UserController@index')}}" class="btn btn-default">Back to User List</a>
    <br>
    <br>
@endsection
<script type="text/javascript">
    var user_type = null;
    var user_status = null;
</script>
<script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/admin/create_user.js') }}"></script>