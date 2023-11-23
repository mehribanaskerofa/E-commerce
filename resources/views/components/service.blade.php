<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>{{$service->title}}</h6>
                    <p>{{$service->description}}</p>
                </div>
            </div>
                @endforeach
        </div>
    </div>
</section>
<!-- Services Section End -->
