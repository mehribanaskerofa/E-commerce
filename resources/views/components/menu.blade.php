<nav class="header__menu">
    <ul>
        @foreach($menuBar as $menuItem)
            @if(!$menuItem->parent_id)
            <li><a href="{{$menuItem->url}}">{{$menuItem->title}}</a></li>
                @if($menuItem->where('parent_id',$menuItem->id)->count())
                   <x-submenu :menuBar="$menuBar" :menuItem="$menuItem"/>
                @endif
            @endif
        @endforeach
    </ul>
</nav>
