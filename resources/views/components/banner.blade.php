<section class="banner set-bg" data-setbg="{{asset('assets/img/banner/banner-1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    @foreach($banners as $banner)
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>{{$banner->title}}</span>
                            <h1>{{$banner->description}}</h1>
                            <a href="{{route('shop')}}">Shop now</a>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
