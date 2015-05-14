@if(is_null($user))
    @include('navigation.unregistered.main.navigation')
@elseif(get_class($user) == 'App\Student')
    @include('navigation.registered.main.student.navigation')
@elseif(get_class($user) == 'App\Teacher')
    @include('navigation.registered.main.teacher.navigation')
@elseif(get_class($user) == 'App\Guardian')
    @include('navigation.registered.main.parent.navigation')
@elseif(get_class($user) == 'App\BusinessManager')
    @include('navigation.registered.main.businessmanager.navigation')
@elseif(get_class($user) == 'App\Admin')
    @include('navigation.registered.main.admin.navigation')
@endif

