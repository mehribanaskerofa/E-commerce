{{--<p class="text-danger">{{ auth()->user()->email ?? '' }}</p>--}}
menu
<li class="nav-item">
    <a href="{{route('admin.home')}}" target="_blank" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Website
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.home')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Admin Home
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('admin.translation.index')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Translation
        </p>
    </a>
</li>
{{--<li class="nav-item">--}}
{{--    <a href="{{route('menu.index')}}" class="nav-link">--}}
{{--        <i class="nav-icon fas fa-th"></i>--}}
{{--        <p>--}}
{{--            Menu--}}
{{--        </p>--}}
{{--    </a>--}}
{{--</li>--}}

<li class="nav-item">
    <a href="{{route('admin.logout')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Logout
        </p>
    </a>
</li>
