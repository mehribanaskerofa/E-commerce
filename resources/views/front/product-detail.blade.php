@extends('front.layouts.layout')
@push('css')
    <style>
        #feedback {
            max-width: 60%;
            width: 100%;
            margin: 10px auto;
            padding: 20px;
            border: solid 1px #f1f1f1;
            background: #fbfbfb;
            box-shadow: #e6e6e6 0 0 4px;
            border-radius: 0.25rem;
        }

        @media (max-width: 720px) {
            #feedback {
                max-width: 90%;
            }
        }

        @media (max-width: 500px) {
            #feedback {
                padding: 10px;
            }
        }

        #fh2 {
            padding: 2px 15px;
            color: #ff4d4d;
            text-align: center;


        }

        @media (max-width: 400px) {
            #fh2 {
                font-size: 20px;
            }
        }


        #fh6 {
            padding: 2px 15px;
            color: black;
            text-align: center;
            font-weight: normal;
        }

        @media (max-width: 400px) {
            #fh6 {
                font-size: 12px;
            }
        }

        .pinfo {
            margin: 8px auto;
            font-weight: bold;
            line-height: 1.5;
            color: #0d0d0d;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.5rem 0.75rem;
            font-size: 1rem;
            line-height: 1.25;
            font-weight: bold;
            color: #6C6262;
            background-color: #fff;
            background-image: none;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
            -webkit-transition: border-color ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
            transition: border-color ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
            -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
        }

        .form-control::-ms-expand {
            background-color: transparent;
            border: 0;
        }

        .form-control:focus {
            color: #696060;
            background-color: #fff;
            border-color: #5cb3fd;
            outline: none;
        }

        .form-control::-webkit-input-placeholder {
            color: #F34949;
            opacity: 1;
        }

        .form-control::-moz-placeholder {
            color: brown;
            opacity: 1;
        }

        .form-control:-ms-input-placeholder {
            color: blue;
            opacity: 1;
        }

        .form-control::placeholder {
            color: white;
            opacity: 1;
        }

        .form-control:disabled, .form-control[readonly] {
            background-color: red;
            opacity: 1;
        }

        .form-control:disabled {
            cursor: not-allowed;
        }

        select.form-control:not([size]):not([multiple]) {
            height: calc(2.25rem + 2px);
        }

        select.form-control:focus::-ms-value {
            color: green;
            background-color: #fff;
        }

        .form-control-file,
        .form-control-range {
            display: block;
        }

        .input-group {
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            width: 100%;
        }

        .input-group .form-control {
            position: relative;
            z-index: 2;
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            width: 1%;
            margin-bottom: 0;
        }

        .input-group .form-control:focus, .input-group .form-control:active, .input-group .form-control:hover {
            z-index: 3;
        }

        .input-group-addon,
        .input-group-btn,
        .input-group .form-control {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .input-group-addon:not(:first-child):not(:last-child),
        .input-group-btn:not(:first-child):not(:last-child),
        .input-group .form-control:not(:first-child):not(:last-child) {
            border-radius: 0;
        }

        .input-group-addon,
        .input-group-btn {
            white-space: nowrap;
            vertical-align: middle;
        }

        .input-group-addon {
            width: 45px;
            padding: 0.5rem 0.75rem;
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: normal;
            line-height: 1.25;
            color: #2e2e2e;
            text-align: center;
            background-color: #eceeef;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
        }

        .input-group-addon.form-control-sm,
        .input-group-sm > .input-group-addon,
        .input-group-sm > .input-group-btn > .input-group-addon.btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            border-radius: 0.2rem;
        }

        .input-group-addon.form-control-lg,
        .input-group-lg > .input-group-addon,
        .input-group-lg > .input-group-btn > .input-group-addon.btn {
            padding: 0.75rem 1.5rem;
            font-size: 1.25rem;
            border-radius: 0.3rem;
        }

        .input-group-addon input[type="radio"],
        .input-group-addon input[type="checkbox"] {
            margin-top: 0;
        }

        .input-group .form-control:not(:last-child),
        .input-group-addon:not(:last-child),
        .input-group-btn:not(:last-child) > .btn,
        .input-group-btn:not(:last-child) > .btn-group > .btn,
        .input-group-btn:not(:last-child) > .dropdown-toggle,
        .input-group-btn:not(:first-child) > .btn:not(:last-child):not(.dropdown-toggle),
        .input-group-btn:not(:first-child) > .btn-group:not(:last-child) > .btn {
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
        }

        .input-group-addon:not(:last-child) {
            border-right: 0;
        }

        .input-group .form-control:not(:first-child),
        .input-group-addon:not(:first-child),
        .input-group-btn:not(:first-child) > .btn,
        .input-group-btn:not(:first-child) > .btn-group > .btn,
        .input-group-btn:not(:first-child) > .dropdown-toggle,
        .input-group-btn:not(:last-child) > .btn:not(:first-child),
        .input-group-btn:not(:last-child) > .btn-group:not(:first-child) > .btn {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
        }

        .form-control + .input-group-addon:not(:first-child) {
            border-left: 0;
        }

        .btn {
            display: inline-block;
            font-weight: normal;
            line-height: 1.25;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            -webkit-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        .btn:focus, .btn:hover {
            text-decoration: none;
        }

        .btn:focus, .btn.focus {
            outline: 0;
            -webkit-box-shadow: 0 0 0 2px rgba(2, 117, 216, 0.25);
            box-shadow: 0 0 0 2px rgba(2, 117, 216, 0.25);
        }

        .btn.disabled, .btn:disabled {
            cursor: not-allowed;
            opacity: .65;
        }

        .btn:active, .btn.active {
            background-image: none;
        }

        a.btn.disabled,
        fieldset[disabled] a.btn {
            pointer-events: none;
        }

        .btn-primary {
            color: #fff;
            background-color: #0275d8;
            border-color: #0275d8;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #025aa5;
            border-color: #01549b;
        }

        .btn-primary:focus, .btn-primary.focus {
            -webkit-box-shadow: 0 0 0 2px rgba(2, 117, 216, 0.5);
            box-shadow: 0 0 0 2px rgba(2, 117, 216, 0.5);
        }

        .btn-primary.disabled, .btn-primary:disabled {
            background-color: #0275d8;
            border-color: #0275d8;
        }

        .btn-primary:active, .btn-primary.active,
        .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #025aa5;
            background-image: none;
            border-color: #01549b;
        }

        /*//star*/
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked) > input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked) > label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked) > label:before {
            content: '★ ';
        }

        .rate > input:checked ~ label {
            color: #ffc700;
        }

        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }

        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>
@endpush
@section('content')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="#">Women’s </a>
                        <span>Essential structured blazer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt" href="#product_image">
                                <img src="{{asset('storage/'.$product->image)}}" alt="">
                            </a>
                            @foreach($product->images as $index=>$image)
                                @if($product->discount_price && $product->discount_type==\App\Enums\DiscountTypes::PERCENT)
                                    <div class="label bg-danger">{{$product->discount_value}}%</div>
                                @endif
                                <a class="pt" href="#product-{{$index}}">
                                    <img src="{{asset('storage/'.$image)}}" alt="">
                                </a>
                            @endforeach
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                @if($product->discount_price && $product->discount_type==\App\Enums\DiscountTypes::PERCENT)
                                    <div class="label bg-danger">{{$product->discount_value}}%</div>
                                @endif
                                <img data-hash="product-image" class="product__big__img"
                                     src="{{asset('storage/'.$product->image)}}" alt="">
                                @foreach($product->images as $index=>$image)
                                    <img data-hash="product-{{$index}}" class="product__big__img"
                                         src="{{asset('storage/'.$image)}}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$product->title}} <span>Brand: SKMEIMore Men Watches from SKMEI</span>
                            <br>
                            <span>Category: {{$product->category->title}}</span>
                        </h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( {{$product->reviews->count()}} reviews )</span>//rating avg duzelt
                        </div>
                        <div class="product__details__price">{{$product->discount_price}}
                            <span>{{$product->price}}</span></div>
                        <p>{{$product->description}}.</p>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            <a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                            <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <input type="checkbox" id="stockin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li>
                                @if($attributes)
                                    @foreach($attributes as $attribute=>$values)
                                        <li>
                                            <span>Available {{$attribute}}:</span>
                                            <div class="size__btn">
                                                @foreach($values as $attrValue) @endforeach
                                                <label for="{{$attrValue->title}}-btn">
                                                    {{--                                            class="active">--}}
                                                    <input type="radio" id="{{$attrValue->title}}-btn">
                                                    {{$attrValue->title}}
                                                    <span class="checkmark"
                                                          style="background-color: {{$attrValue->value}}"
                                                    ></span>
                                                </label>

                                            </div>
                                        </li>
                                    @endforeach
                                @endif


                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews
                                    ( {{$product->reviews()->count()}} )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p>{{$product->description}}</p>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Specification</h6>
                                <p>{{$product->specification}}</p>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">

                                <h6>Reviews ( {{$product->reviews->count()}} ) for {{$product->title}}</h6>
                                {{--                                //review--}}
                                <div class="blog__details__comment">
                                    <h5>{{$product->reviews()->count()}} Comment</h5>
                                    <a href="#review-form" class="leave-btn">Leave a comment</a>

                                    @foreach($product->reviews as $review)
                                        <div class="blog__comment__item">

                                            <div class="blog__comment__item__text">
                                                <h6>{{$review->fullname}}</h6>
                                                <p>{{$review->comment}}</p>
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-clock-o"></i> {{$review->created_at->diffForHumans()}}
                                                    </li>
                                                    {{--                                                    <li><i class="fa fa-heart-o"></i> </li>--}}
                                                    <li>
                                                        <div class="rate">
                                                            @for($i=1;$i<=5;$i++)
                                                                <input type="radio" id="star{{$i}}" name="rate"
                                                                       value="{{$i}}"
                                                                       @if($review->rating==$i)
                                                                           checked
                                                                    @endif
                                                                />
                                                                <label for="star{{$i}}" title="text">{{$i}}
                                                                    stars</label>
                                                            @endfor
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                                {{--                                //form--}}
                                <div class="blog__details__comment" id="review-form">
                                    <h5>Add Comment</h5>
                                    <h2 id="fh2">WE APPRECIATE YOUR REVIEW!</h2>
                                    <h6 id="fh6">Your review will help us to improve our web hosting quality products,
                                        and customer services.</h6>


                                    <form id="feedback" action="">
                                        <div class="pinfo">Your personal info</div>
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="form-group">
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input name="fullname" placeholder="John Doe" class="form-control"
                                                           type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-envelope"></i></span>
                                                    <input name="email" type="email" class="form-control"
                                                           placeholder="john.doe@yahoo.com">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="pinfo">Rate our overall services.</div>


                                        <div class="form-group">
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-heart"></i></span>
                                                    {{--                                                    <select class="form-control rate-stars" id="rate" >--}}
                                                    {{--                                                        <option value="1star">1</option>--}}
                                                    {{--                                                        <option value="2stars">2</option>--}}
                                                    {{--                                                        <option value="3stars">3</option>--}}
                                                    {{--                                                        <option value="4stars">4</option>--}}
                                                    {{--                                                        <option value="5stars">5</option>--}}
                                                    {{--                                                    </select>--}}
                                                    <div class="rate">
                                                        <input type="radio" id="star5" name="rate" value="5"/>
                                                        <label for="star5" title="text">5 stars</label>
                                                        <input type="radio" id="star4" name="rate" value="4"/>
                                                        <label for="star4" title="text">4 stars</label>
                                                        <input type="radio" id="star3" name="rate" value="3"/>
                                                        <label for="star3" title="text">3 stars</label>
                                                        <input type="radio" id="star2" name="rate" value="2"/>
                                                        <label for="star2" title="text">2 stars</label>
                                                        <input type="radio" id="star1" name="rate" value="1"/>
                                                        <label for="star1" title="text">1 star</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pinfo">Write your feedback.</div>


                                        <div class="form-group">
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <textarea name="comment" class="form-control" id="review"
                                                              rows="3"></textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>


                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                             data-setbg="{{asset('assets/img/product/related/rp-1.jpg')}}">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="{{asset('assets/img/product/related/rp-1.jpg')}}" class="image-popup"><span
                                            class="arrow_expand"></span></a></li>
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
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-2.jpg">
                            <ul class="product__hover">
                                <li><a href="{{asset('assets/img/product/related/rp-2.jpg')}}" class="image-popup"><span
                                            class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Flowy striped skirt</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 49.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                             data-setbg="{{asset('assets/img/product/related/rp-3.jpg')}}">
                            <div class="label stockout">out of stock</div>
                            <ul class="product__hover">
                                <li><a href="{{asset('assets/img/product/related/rp-3.jpg')}}" class="image-popup"><span
                                            class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Cotton T-Shirt</a></h6>
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
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                             data-setbg="{{asset('assets/img/product/related/rp-4.jpg')}}">
                            <ul class="product__hover">
                                <li><a href="{{asset('assets/img/product/related/rp-4.jpg')}}" class="image-popup"><span
                                            class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Slim striped pocket shirt</a></h6>
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
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

@endsection
@push('js')
    <script>
        $(document).on('submit', '#feedback', function (e) {
            e.preventDefault();
            let data;
            $(this).serializeArray().forEach(function (el) {
                data[el['name']] = el['value'];
            });
            $.ajax({
                method: 'post',
                data: {
                    _token: $("meta[name='token']").attr('content'),
                    ...data
                },
                url: {{route('product-review')}},
                beforeSend() {
                    $('.error-data').remove();
                },
                success() {
                    window.location.reload();
                },
                error(err) {
                    if (err.status == 422) {//422- validation
                        Object.keys(err.responseJSON.errors).forEach(function (errKey) {
                            $(`input[name=${errKey}]`).parent()
                                .append(`<small class='text-danger error-data' >
                               ${err.responseJSON.errors[errKey]}
                                </small>`);
                            $(`textarea[name=${errKey}]`).parent()
                                .append(`<small class='text-danger error-data' >
                               ${err.responseJSON.errors[errKey]}
                                </small>`);
                        });
                    }
                }
            });
        });

    </script>
@endpush
