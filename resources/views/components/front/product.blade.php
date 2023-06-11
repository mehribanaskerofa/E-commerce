<div class="col-lg-4 col-md-6">
    <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="{{asset('storage/'.$product->image)}}">
            @if($product->discount_price && $product->discount_type==\App\Enums\DiscountTypes::PERCENT)
                <div class="label bg-danger">{{$product->discount_value}}%</div>
            @endif

            <ul class="product__hover">
                <li><a href="{{asset('storage/'.$product->image)}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
            </ul>
        </div>
        <div class="product__item__text">
            <h6><a href="{{route('category.slug',$product->category->slug)}}">{{$product->category->title}}</a>
                : <a href="{{route('product-detail',$product->slug)}}"><b> {{$product->title}}</b></a></h6>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            @if($product->discount_price)
                <div class="product__price text-decoration-line-through">{{$product->price}}</div>
                <div class="product__price">{{$product->discount_price}}</div>
            @else
                <div class="product__price">{{$product->price}}</div>
            @endif
        </div>
    </div>
</div>
