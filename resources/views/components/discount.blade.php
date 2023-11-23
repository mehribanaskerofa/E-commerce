@if($discount)
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="{{asset('storage/'.$discount->image)}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>{{$discount->title}}</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>{{now().diffInDays($discount->date)}}</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>{{now().diffInHours($discount->date)}}</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>{{now().diffInMinutes($discount->date)}}</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>{{now().diffInSeconds($discount->date)}}</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
