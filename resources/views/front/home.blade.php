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
<x-banner/>
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
<x-discount/>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<x-service/>
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
