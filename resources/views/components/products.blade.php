@foreach($products as $product)
<div class="col-lg-3 col-md-4 col-sm-6 mix ">
    <div class="product__item">
        <div class="product__item__pic set-bg"
             data-setbg="{{ asset('assets/img/product/product-1.jpg')}}"
        >
{{--            <div class="label new">New</div>--}}
            @if($product->discount_price && $product->discount_type==\App\Enums\DiscountTypes::PERCENT)
                <div class="label bg-danger">{{$product->discount_value}}%</div>
            @endif
            <ul class="product__hover">
                <li><a href="{{asset('assets/img/product/product-1.jpg')}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
            </ul>
        </div>
        <div class="product__item__text">
            <h6><a href="#">Buttons tweed blazer</a></h6>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="product__price">$ 59.0</div>
        </div>
    </div>
</div>
@endforeach
{{--{{$products->links("pagination::bootstrap-4")}}--}}
