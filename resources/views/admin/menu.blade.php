<nav id="primary-nav">
    <ul>
        <li><a href="{{route('main-admin')}}" class="{{Route::currentRouteName() == 'main-admin' ? 'active' : ''}}"><i class="fa fa-fire"></i>Головна</a></li>
        @if($data['role']->role_id == \App\Models\User::ROLE_ADMIN)
            <li><a href="{{route('categories')}}" class="{{Route::currentRouteName() == 'categories' ? 'active' : ''}}"><i class="fa fa-fire"></i>Категорії</a></li>
            <li><a href="{{route('admin-advantages')}}" class="{{Route::currentRouteName() == 'admin-advantages' ? 'active' : ''}}"><i class="fa fa-fire"></i>Переваги</a></li>
            <li><a href="{{route('admin-about-us')}}" class="{{Route::currentRouteName() == 'admin-about-us' ? 'active' : ''}}"><i class="fa fa-fire"></i>Про нас</a></li>
        @endif
        @if($data['role']->role_id == \App\Models\User::ROLE_TEACHER)
            <li><a href="{{route('tests')}}" class="{{Route::currentRouteName() == 'tests' ? 'active' : ''}}"><i class="fa fa-fire"></i>Тестування</a></li>
        @endif
        @if($data['role']->role_id == \App\Models\User::ROLE_STUDENT)
            <li><a href="{{route('student-tests')}}" class="{{Route::currentRouteName() == 'tests' ? 'active' : ''}}"><i class="fa fa-fire"></i>Тестування</a></li>
        @endif
    </ul>
</nav>