<div class="collapse navbar-collapse offset" id="navbarSupportedContent" >
    <ul class="nav navbar-nav menu_nav ml-auto">
        @foreach($menu as $name => $src)
            @if(is_array($src) == false)
                <li class="nav-item {{request()->path() == $src ? 'active' : '/' . request()->path() ==  $src ? 'active' : ''}}">
                    <a class="nav-link" href="{{$src}}">{{$name}}</a>
                </li>
            @else
                <li class="nav-item submenu dropdown {{request()->path() == $src['hard'] ? 'active' : '/' . request()->path() ==  $src['hard'] ? 'active' : ''}}">
                    <a href="{{$src['hard']}}" class="nav-link dropdown-toggle"   >{{$name}}</a >
                    <ul class="dropdown-menu">
                        @foreach($src['soft'] as $id => $title)
                            <li class="nav-item">
                                <a class="nav-link" href="{{'/category/'. $id}}">{{$title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
        <li class="nav-item">
            <a href="#" class="nav-link search" id="search">
                <i class="ti-search"></i>
            </a>
        </li>
            @if(\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item">
                    <a href="/adm" class="nav-link" id="admin">
                        {{Auth::user()->name}}
                    </a>
                </li>
            @else
            <li class="nav-item">
                <a href="/login" class="nav-link" id="login">
                    <i class="ti-user"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="/regist" class="nav-link" id="register">
                    <i class="ti-shift-right"></i>
                </a>
            </li>
            @endif
        <!--  -->
    </ul>
</div>