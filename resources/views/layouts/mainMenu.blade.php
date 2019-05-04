<div class="collapse navbar-collapse offset" id="navbarSupportedContent" >
    <ul class="nav navbar-nav menu_nav ml-auto">
        @foreach($menu as $name => $src)
            @php
                //dd($src);
            @endphp
            @if(is_array($src) == false)
                <li class="nav-item {{ request()->is(str_replace(Request::url(), '/', $src)) ? 'active' : '' }}">
                    <a class="nav-link" href="{{$src}}">{{$name}}</a>
                </li>
            @else
                <li class="nav-item submenu dropdown {{ request()->is(str_replace('http://localhost', '/', $src['hard'])) ? 'active' : '' }}">
                    <a href="{{$src['hard']}}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >{{$name}}</a >
                    <ul class="dropdown-menu">
                        @foreach($src['soft'] as $id => $title)
                            <li class="nav-item">
                                <a class="nav-link" href="#{{$id}}">{{$title}}</a>
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
        <li class="nav-item">
            <a href="#" class="nav-link" id="login">
                <i class="ti-user"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link" id="register">
                <i class="ti-shift-right"></i>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="#" class="nav-link" id="admin">
            User Name
          </a>
        </li> -->
    </ul>
</div>