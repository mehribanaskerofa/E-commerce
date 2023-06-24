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
    <a href="{{route('admin.menu.index')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Menu

        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.category.index')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Category
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.product.index')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Product
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.attribute.index')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Attribute
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.service.index')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Service
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.subscribe.index')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Subscribe
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.contact.index')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Contact
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.logout')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Logout
        </p>
    </a>
</li>
