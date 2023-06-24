<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Register Form</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper bg-red  font-robo" style="padding-top: 30px;">
    <div class="wrapper wrapper--w960">
        <div class="card card-2">
            <div class="card-body">
                <h2 class="title">Registration Info</h2>
                <form method="POST" action="{{route('front-register')}}">
                    @csrf
                    <div class="input-group">
                        <input class="input--style-2" type="text" placeholder="FullName" name="fullname">
                    </div>
                    <div class="row row-space">
                        <div class="col-6">
                            <div class="input-group">
                                <input class="input--style-2" type="email" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input class="input--style-2" type="password" placeholder="Password" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                    <div class="col-6 d-flex">
                        <input type="checkbox" value="0" id="rememberMe" name="remember_me" style="width: 20px;margin-right: 10px"> remember me
                    </div>
                    </div>
                    <div class="p-t-30">
                        <button class="btn btn--radius btn--green">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{--<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>--}}
{{--<script src="{{asset('assets/js/global.js')}}"></script>--}}

</body>

</html>
