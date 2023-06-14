@extends('front.layouts.layout')

@section('content')

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="categories__item categories__large__item set-bg"
                     data-setbg="{{asset('assets/img/categories/category-1.jpg')}}">
                    <div class="categories__text">
                        <h1>{{$womanCategory->title}}</h1>
                        <a href="{{route('category.slug',$womanCategory->slug)}}">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="{{asset('storage/'.$category->image)}}">
                                <div class="categories__text">
                                    <h4>{{$category->title}}</h4>
                                    <p>{{count($category->products)}}</p>
                                    <a href="{{route('category.slug',$category->slug)}}">Shop now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Products</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active product-link" data-slug="All">All</li>
                    <li class="product-link" data-slug="{{$womanCategory->slug}}">{{$womanCategory->title}}</li>
                @foreach($categories as $category)
                        <li class="product-link" data-slug="{{$category->slug}}">{{\Illuminate\Support\Str::upper($category->title)}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row property__gallery" id="product-by-slug">
                <x-products :products="$products"/>
        </div>
        {{$products->links("pagination::bootstrap-4")}}
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="{{asset('assets/img/banner/banner-1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
    <div class="container">
        <div class="row">
            <x-type-products title="Hot Trend" :product-type="\App\Enums\ProductTypes::HOT_TREND->value"/>
            <x-type-products title="Best seller" :product-type="\App\Enums\ProductTypes::BEST_SELLER->value"/>
            <x-type-products title="Featured Products" :product-type="\App\Enums\ProductTypes::FEATURED->value"/>
{{--            @component('front.featured-products',['a'=>'a'])--}}
        </div>
    </div>
</section>
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="{{asset('assets/img/discount.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2019</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->


@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('.product-link').on('click',function (){
                $.ajax({
                    method:'get',
                    url:"{{route('get-products-category-slug',['slug'])}}".replace('slug',$(this).attr("data-slug")),
                    success(datas){
                        $('#product-by-slug').html(datas);
                        // $('.select2').select2();

                    }
                })
            })
        })

    </script>
@endpush
