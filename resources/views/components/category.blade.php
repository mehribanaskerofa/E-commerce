<div class="sidebar__categories">
    <div class="section-title">
        <h4>Categories</h4>
    </div>
    <div class="categories__accordion">
        <div class="accordion" id="accordionExample">
            @foreach($categories->where('parent_id',null) as $parentCategory)
            <div class="card">
                <div class="card-heading active">
                    <a data-toggle="collapse" data-target="#collapseOne"
                       href="{{route('category.slug',$parentCategory->title)}}">{{$parentCategory->title}}</a>
                </div>
                @if($categories->where('parent_id',$parentCategory->id)->count())
                    <div id="collapseOne" class="collapse
                    @if($category)
                    @if($parentCategory->id==$category->id || $parentCategory->id==$category->parent_id) show @endif @endif
                    " data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                @foreach($categories->where('parent_id',$parentCategory->id) as $childCategory)
                                <li><a href="{{route('category.slug',$childCategory->title)}}">{{$childCategory->title}} ({{count($childCategory->products)}})</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

            </div>
            @endforeach
        </div>
    </div>
</div>
