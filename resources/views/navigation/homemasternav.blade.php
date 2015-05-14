@if(is_null($user))
    @include('navigation.unregistered.home.navigation')
@elseif(get_class($user) == 'App\Student')
    @include('navigation.registered.home.student.navigation')
@elseif(get_class($user) == 'App\Teacher')
    @include('navigation.registered.home.teacher.navigation')
@elseif(get_class($user) == 'App\Guardian')
    @include('navigation.registered.home.parent.navigation')
@elseif(get_class($user) == 'App\BusinessManager')
    @include('navigation.registered.home.businessmanager.navigation')
@elseif(get_class($user) == 'App\Admin')
    @include('navigation.registered.home.admin.navigation')
@endif


