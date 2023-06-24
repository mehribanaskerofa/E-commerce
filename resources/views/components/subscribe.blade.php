<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<form action="{{route('front-subscribe')}}" class="subscribe-form" method="post">
    @csrf
    <input type="email" class="subscribe-email" placeholder="Email" name="email" required>
    <button type="submit" class="site-btn subscribe-btn">Subscribe</button>
</form>

<script>
    $(document).on('submit','.subscribe-form',function (e){
        e.preventDefault()
        var email = $('.subscribe-email').val();
        console.log(email);
        $.ajax({
            method:'POST',
            url: "{{route('front-subscribe')}}",
            data:{
                _token: $('meta[name=token]').attr('content'),
                email:email
            },
            success(){
                console.log(2);
            }
        })
    })
</script>
