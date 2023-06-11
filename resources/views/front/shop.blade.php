@extends('front.layouts.layout')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">

                        <x-category :category="$category ?? []"/>

                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                     data-min="33" data-max="99"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#">Filter</a>
                        </div>


{{--                        <div class="sidebar__sizes">--}}
{{--                            <div class="section-title">--}}
{{--                                <h4>Shop by size</h4>--}}
{{--                            </div>--}}
{{--                            <div class="size__list">--}}
{{--                                <label for="xxs">--}}
{{--                                    xxs--}}
{{--                                    <input type="checkbox" id="xxs">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="xs">--}}
{{--                                    xs--}}
{{--                                    <input type="checkbox" id="xs">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="xss">--}}
{{--                                    xs-s--}}
{{--                                    <input type="checkbox" id="xss">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="s">--}}
{{--                                    s--}}
{{--                                    <input type="checkbox" id="s">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="m">--}}
{{--                                    m--}}
{{--                                    <input type="checkbox" id="m">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="ml">--}}
{{--                                    m-l--}}
{{--                                    <input type="checkbox" id="ml">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="l">--}}
{{--                                    l--}}
{{--                                    <input type="checkbox" id="l">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="xl">--}}
{{--                                    xl--}}
{{--                                    <input type="checkbox" id="xl">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="sidebar__color">--}}
{{--                            <div class="section-title">--}}
{{--                                <h4>Shop by size</h4>--}}
{{--                            </div>--}}
{{--                            <div class="size__list color__list">--}}
{{--                                <label for="black">--}}
{{--                                    Blacks--}}
{{--                                    <input type="checkbox" id="black">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="whites">--}}
{{--                                    Whites--}}
{{--                                    <input type="checkbox" id="whites">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="reds">--}}
{{--                                    Reds--}}
{{--                                    <input type="checkbox" id="reds">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="greys">--}}
{{--                                    Greys--}}
{{--                                    <input type="checkbox" id="greys">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="blues">--}}
{{--                                    Blues--}}
{{--                                    <input type="checkbox" id="blues">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="beige">--}}
{{--                                    Beige Tones--}}
{{--                                    <input type="checkbox" id="beige">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="greens">--}}
{{--                                    Greens--}}
{{--                                    <input type="checkbox" id="greens">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                                <label for="yellows">--}}
{{--                                    Yellows--}}
{{--                                    <input type="checkbox" id="yellows">--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <x-front.attribute :product="$products"/>

                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">

                        @foreach($products as $product)
                            <x-front.product :product="$product" />
                        @endforeach
                        <div class="col-lg-12 text-center">
                                {{$products->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->


@endsection
