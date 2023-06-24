<ul class="dropdown">
    @foreach($menuBar->where('parent_id',$menuItem->id) as $menuItem2)
        <li><a href="{{$menuItem2->url}}">{{$menuItem2->title}}</a></li>

                @if($menuBar->where('parent_id',$menuItem2->id)->count())
                <x-submenu :menuBar="$menuBar" :menuItem="$menuItem2"/>
                 @endif
    @endforeach
</ul>
