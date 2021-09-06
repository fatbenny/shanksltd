<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style>
            .dropdown-menu[data-bs-popper] {
                left: -7vw;
            }         
            @yield("css")
        </style>
    </head>
    <body class="antialiased  bg-gray-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <a class="navbar-brand" href="/">香克斯作業</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-5">
                        <a class="nav-link active" aria-current="page" href="{{ url('/daily') }}">查看當日星座</a>
                    </li>
                </ul>
                <form class="d-flex">
                    @if (Route::has('login'))
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @auth
                            <!-- <li class="nav-item me-5">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li> -->
                            <div class="dropdown text-end">
                                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                                </a>
                                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                    <!-- <li><a class="dropdown-item" href="{{ url('/user/profile') }}">用戶資訊</a></li> -->
                                    <li><a class="dropdown-item" href="{{ url('/logout') }}">登出</a></li>
                                </ul>
                            </div>
                            @else
                                <li class="nav-item me-5">
                                    <a href="{{url('/login')}}" class="nav-link">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item me-5">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                                @endif
                            @endauth
                        </ul>
                    @endif
                </form>
                </div>
            </div>
        </nav>

        <div class="container  bg-gray-100" style="min-height: 85vh;overflow:hidden;">
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
        <script>
        @yield('js')
        function C_ajax(type,url,data,redirect){
            if(data == ''){
                data = {
                    "_token": "{{ csrf_token() }}",
                }
            }
            $.ajax({
                type: type,
                url: url,
                data: data,
                success: function(msg) {
                    $.alert(msg.message);
                    if(msg.status){
                        setTimeout(() => {
                            window.location.href = redirect;
                        }, 1000);
                    }
                }
            });
        }
    </script>
    </body>
</html>
