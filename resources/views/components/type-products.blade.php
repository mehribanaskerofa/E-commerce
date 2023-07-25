<div class="col-lg-4 col-md-4 col-sm-6">
    <div class="trend__content">
        <div class="section-title">
            <h4>{{$title}}</h4>
        </div>
        @foreach($products as $product)
            <div class="trend__item">
                <a href="{{route('product-detail',$product->slug)}}">
                <div class="trend__item__pic">
                    <img src="{{asset('storage/'.$product->image)}}" style="width: 100px; height: 100px;object-fit: cover;" alt="{{$product->title}}">
                </div>
                </a>
                <div class="trend__item__text">
                    <a href="{{route('category.slug',$product->slug)}}"><h6>{{$product->category->title}}</h6></a>
                    <a href="{{route('product-detail',$product->slug)}}"> <h6>{{$product->title}}</h6></a>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product__price">{{$product->price}}</div>
                </div>
            </div>
        @endforeach


    </div>
</div>
