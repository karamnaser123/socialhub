<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('image/logohub.png') }}" />

    <title>Forget Password</title>
    <meta name="keywords"
        content="smm panel,best smm panel,smm panel script,cheap smm panel,cheapest smm panel,how to use smm panel,smm panel instagram,buy smm panel,smm panel india,indian smm panel,free smm panel,what is smm panel,smm,reseller smm panel,Social Hub.com,Social Hub">
    <meta name="description"
        content="Social Hub.com has the Cheapest SMM Panel and 100% High Quality for all social networks. The main provider of all smm panels!">
    {{-- <link rel="shortcut icon" type="image/ico" href="https://cdn.mypanel.link/7o9f2j/o0xcc9707h4ws7iw.png" /> --}}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179027971-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-179027971-2');
    </script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/fontawesome.min.js"
        integrity="sha512-PoFg70xtc+rAkD9xsjaZwIMkhkgbl1TkoaRrgucfsct7SVy9KvTj5LtECit+ZjQ3ts+7xWzgfHOGzdolfWEgrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
        integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.mypanel.link/7o9f2j/p815mj75x8emy7k5.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.mypanel.link/7o9f2j/yo6rcmtm2t0gjsiy.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.mypanel.link/libs/bootstrap-datetimepicker/4.17.47/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.mypanel.link/css/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.mypanel.link/global/tp2jssyocan4ndm1.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="row" style="height: 99px;">
                <div class="col-auto align-self-center">
                    <div class="row">
                        <div class="col align-self-center">
                            <a href="/">
                                <div class="site-name">
                                    <img style="width: 150px; height: 130px;" src="{{ asset('image/logohub.png') }}"
                                        alt="" title="">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="head-menu">
                        <div class="row">

                            <div class="col-auto align-self-center mmff">
                                <a href="{{ route('login') }}" class="menu-btn">
                                    <div class="mb-icon">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <div class="mb-text"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto for-mobile align-self-center">
                    <div class="home-menu-btn px-3 py-4" onclick="homeMenuToggle()" style="color: #fff;">
                        <i class="fal fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="mob-nav">
        <ul class="mob-nav-link">
            <li>
                <a href="{{ route('login') }}">
                    <i class="fal fa-sign-in-alt"></i>
                    <span>@lang('messages.Sign In')</span>
                </a>
            </li>

            <li>
                <a href="{{ route('register') }}">
                    <i class="fal fa-user"></i>
                    <span> @lang('messages.Sign Up')</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- Main variables *content* -->
    <div class="main-top">
        <div class="main-top-bg"></div>
        <div class="main-top-content">
            <div class="container" style="position: relative;">

                <div class="main-top-real-content">
                    <div class="row align-items-center">
                        <div class="col-lg-6 align-self-center">
                            <div class="head-text">
                                <h1><span class="main-color">Social Hub</span> <br> @lang('messages.We are fame makers')</h1>
                                <p> @lang('messages.The All-In-One Social Media Marketing tool you will need') </p>
                            </div>
                            <div class="head-links row mt-5">
                                <div class="col-auto mb-4 mb-md-0">
                                    <a href="{{ route('main') }}" class="btn btn-primary btn-lg">
                                        @lang('messages.Our Services')</a>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('login') }}" class="btn btn-outline btn-lg"> @lang('messages.Sign In')</a>
                                </div>
                            </div>
                            <div class="main-stats">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 mb-4 col-12">
                                        <div class="home-stat br">
                                            <div class="row">
                                                <div class="col-auto align-self-center">
                                                    <i class="far fa-crown"></i>
                                                </div>
                                                <div class="col align-self-center">
                                                    <div class="hstat-text">{{ $orderscount }}+</div>
                                                    <div class="hstat-title"> @lang('messages.Total Orders')</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mb-4 col-12">
                                        <div class="home-stat">
                                            <div class="row">
                                                <div class="col-auto align-self-center">
                                                    <i class="far fa-smile"></i>
                                                </div>
                                                <div class="col align-self-center">
                                                    <div class="hstat-text">{{ $userscount }}+</div>
                                                    <div class="hstat-title"> @lang('messages.Active User')</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 offset-lg-1">

                            <div class="login-card">
                                <div class="lc-body">
                                    <div class="lc-title">
                                        <h4> @lang('messages.Create an account')</h4>
                                        <small> @lang('messages.Create an account by fill up this form')</small>
                                        <form action="{{ route('password.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="token"
                                                value="{{ $request->route('token') }}">


                                            <div class="login-form mt-5 py-3">




                                                <div class="fg fg-light mb-4">
                                                    <div class="fg-icon"><i class="far fa-user"></i></div>
                                                    <input type="email" class="fg-control" id="email"
                                                        value="{{ $request->email }}" name="email"
                                                        placeholder="Email" readonly>
                                                </div>

                                                <x-input-error :messages="$errors->get('email')" class="mt-2"
                                                    style="font-size: 15px; color:red" />

                                                <div class="fg fg-light mb-4">
                                                    <div class="fg-icon"><i class="far fa-lock-alt"></i></div>
                                                    <input type="password" class="fg-control" id="password"
                                                        value="" name="password"
                                                        placeholder=" @lang('messages.Password')">
                                                </div>

                                                <x-input-error :messages="$errors->get('password')" class="mt-2"
                                                    style="font-size: 15px; color:red" />
                                                <div class="fg fg-light mb-4">
                                                    <div class="fg-icon"><i class="far fa-lock-alt"></i></div>
                                                    <input type="password" class="fg-control"
                                                        id="password_confirmation" value=""
                                                        name="password_confirmation"
                                                        placeholder=" @lang('messages.Confirm Password')">
                                                </div>

                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"
                                                    style="font-size: 15px; color:red" />
                                                @if (session('status'))
                                                    <p style="font-size: 15px; color:green">{{ session('status') }}
                                                    </p>
                                                @endif


                                                <div class="row mt-4">
                                                    <div class="col-md-12 mb-5 mb-md-0">
                                                        <button type="submit"
                                                            class="btn btn-primary btn-lg btn-block">
                                                            @lang('messages.Reset Password')
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="btn btn-dark btn-block mt-3">
                                                    @lang('messages.You Remember Your Password') <a href="{{ route('login') }}">
                                                        @lang('messages.Sign in')
                                                    </a>
                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-lg-12 align-self-center">


                    </div>

                </div>
            </div>
        </div>
    </div>









    <style>
        .particle-snow {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none
        }

        .particle-snow canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none
        }

        .christmas-garland {
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            position: absolute;
            z-index: 1;
            padding: 0;
            pointer-events: none;
            width: 100%;
            height: 85px
        }

        .christmas-garland .christmas-garland__item {
            position: relative;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: inline-block;
            margin-left: 20px
        }

        .christmas-garland .christmas-garland__item .shape {
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            -webkit-animation-name: flash-1;
            animation-name: flash-1;
            -webkit-animation-duration: 2s;
            animation-duration: 2s
        }

        .christmas-garland .christmas-garland__item .apple {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 8px
        }

        .christmas-garland .christmas-garland__item .pear {
            width: 12px;
            height: 28px;
            border-radius: 50%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 6px
        }

        .christmas-garland .christmas-garland__item:nth-child(2n+1) .shape {
            -webkit-animation-name: flash-2;
            animation-name: flash-2;
            -webkit-animation-duration: .4s;
            animation-duration: .4s
        }

        .christmas-garland .christmas-garland__item:nth-child(4n+2) .shape {
            -webkit-animation-name: flash-3;
            animation-name: flash-3;
            -webkit-animation-duration: 1.1s;
            animation-duration: 1.1s
        }

        .christmas-garland .christmas-garland__item:nth-child(odd) .shape {
            -webkit-animation-duration: 1.8s;
            animation-duration: 1.8s
        }

        .christmas-garland .christmas-garland__item:nth-child(3n+1) .shape {
            -webkit-animation-duration: 1.4s;
            animation-duration: 1.4s
        }

        .christmas-garland .christmas-garland__item:before {
            content: "";
            position: absolute;
            background: #222;
            width: 10px;
            height: 10px;
            border-radius: 3px;
            top: -1px;
            left: 9px
        }

        .christmas-garland .christmas-garland__item:after {
            content: "";
            top: -9px;
            left: 14px;
            position: absolute;
            width: 52px;
            height: 18px;
            border-bottom: solid #222 2px;
            border-radius: 50%
        }

        .christmas-garland .christmas-garland__item:last-child:after {
            content: none
        }

        .christmas-garland .christmas-garland__item:first-child {
            margin-left: -40px
        }
    </style>
    <script type="text/javascript" src="https://cdn.mypanel.link/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.mypanel.link/global/cflcci28nes0yhln.js"></script>
    <script type="text/javascript" src="https://cdn.mypanel.link/global/t3u8bszy7ju8y8or.js"></script>
    <script type="text/javascript" src="https://cdn.mypanel.link/global/oor0gfnm6a7rec3u.js"></script>
    <script type="text/javascript" src="https://cdn.mypanel.link/global/fl30lzzomp4w0yk2.js"></script>
    <script type="text/javascript" src="https://cdn.mypanel.link/global/x8eo1d0qmu03i9qb.js"></script>
    <script type="text/javascript" src="https://cdn.mypanel.link/7o9f2j/uk61wee6rlsamd3t.js"></script>
    <script type="text/javascript" src="https://cdn.mypanel.link/7o9f2j/5o3pnem47xy64u1z.js"></script>
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=en"></script>
    <script type="text/javascript">
        window.modules.layouts = {
            "theme_id": 4,
            "auth": 0,
            "live": true,
            "csrftoken": "Rnqh8pes0d_DAZBqVfr3WJpNvwmCnhXBXfDRlqpsuHIzKMXE3Z26p_Fb-lwdr6MJ6xSIQOTuf4pwlJX0yVnsEQ=="
        };
    </script>
    <script type="text/javascript">
        window.modules.signup = [];
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var newYearEvent = new window.NewYearEvent({
                "snow": {
                    "init": true,
                    "options": {
                        "particles": {
                            "move": {
                                "speed": 3,
                                "bounce": false,
                                "enable": true,
                                "random": false,
                                "attract": {
                                    "enable": false,
                                    "rotateX": 600,
                                    "rotateY": 1200
                                },
                                "out_mode": "out",
                                "straight": false,
                                "direction": "bottom"
                            },
                            "size": {
                                "anim": {
                                    "sync": false,
                                    "speed": 40,
                                    "enable": false,
                                    "size_min": 0.1
                                },
                                "value": 5,
                                "random": true
                            },
                            "color": {
                                "value": "#fff"
                            },
                            "number": {
                                "value": 20,
                                "density": {
                                    "enable": true,
                                    "value_area": 650
                                }
                            },
                            "opacity": {
                                "anim": {
                                    "sync": false,
                                    "speed": 1,
                                    "enable": true,
                                    "opacity_min": 0.9
                                },
                                "value": 0.9,
                                "random": true
                            },
                            "line_linked": {
                                "color": "#ffffff",
                                "width": 1,
                                "enable": false,
                                "opacity": 0.8,
                                "distance": 500
                            }
                        },
                        "interactivity": {
                            "modes": {
                                "bubble": {
                                    "size": 4,
                                    "speed": 3,
                                    "opacity": 1,
                                    "distance": 400,
                                    "duration": 0.3
                                },
                                "repulse": {
                                    "speed": 3,
                                    "distance": 200,
                                    "duration": 0.4
                                }
                            },
                            "events": {
                                "resize": true,
                                "onclick": {
                                    "mode": "repulse",
                                    "enable": true
                                },
                                "onhover": {
                                    "mode": "bubble",
                                    "enable": false
                                }
                            },
                            "detect_on": "window"
                        },
                        "retina_detect": true
                    }
                },
                "toys": {
                    "init": false,
                    "options": {
                        "count": 20,
                        "speed": 1,
                        "images": [
                            "data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAABGdBTUEAALGPC\/xhBQAAAAFzUkdCAK7OHOkAAAL3UExURUdwTP\/\/\/\/Hw8aenp\/T09Pr7+\/\/\/AIGBfaGgnPn4+IyLiKKhoPDv8ImGgczMx\/\/\/\/6+ure7w7Zublu\/u7n+BfLKxsJKSj+\/u7wAXOvb29cbFxe7t7u7t7tTT0v\/\/\/\/Dv8P7+\/v\/\/\/\/X19KSkoP\/\/\/87OzPLx8fLx8ZyblMHBwJ6emsrJyMrJyM3MzLW1s7q5t6ysp7Oysc7NzeXl4vHx8enp6f\/\/\/\/\/\/\/8zLy+3s7bi3t4iIiJOTj6KgnsTEwMTDwsnIxba1tLS0s+zs7L+\/vuno6\/\/\/\/6Ghn5aWkvLx8pCQjMLCwK+vrbS0sZOTkJGRjfPy85ubl\/\/\/\/5eWk5WVkq+vrsrKyKiopfX19K6uq7y8u7Kwr6WlotnZ2cfHw5qal6Cgnf\/\/\/6OjoszLyczHxdXV1NTT0q2trMvLyp6dm\/\/\/\/\/36\/fLz88PDwtjY1uXk5d\/e3\/j4+Lu7uZqalvDw8aKhoP\/\/\/6mop\/\/\/\/87OzpGRjLa1s8\/PzPj29be3tru7uJKRjcrJyP39\/bm4t7y8uP79\/tDQ0ICAe+no6f7+\/v7+\/qCem\/7+\/8TEwcXFwMjIx+jo5K6urMfGxvT09aKin+Dg3JKSkfX09KurqdjZ1ujn6I+Pjbi4uPj4+NDQ0L28vNXT05OTk\/n5+u\/v7vb19J2dm\/z6\/K+vrrW1s9PT0d7e3tnY2dXU1Pr6+pCQjf\/\/\/6Cgntzc3efl5+rq6oiIgqGhnePj48C\/vunp6bu7uezs7dLR0YuLhtfX2P79\/a2trUYC4QLt7v\/\/\/\/\/\/\/9HQ0dDP0dDQ0dHQ0s7NztDQ0M\/P0OHg4tHR0tLS08\/Pz7m5uNfV183MzdXV1djY2eno6qurqtnZ2dHP0r28vODg4dbW18fGyMzLzNfX2MvKysXExtTT1M\/Oz8HAwcLCw87Oz769vfHw8uPi5O\/u8NrZ29bV1qmpp9bV1dzb3KampaOjouzr7NbW1uXl5snIyb++vu7t7t7e366urc\/P0bOysvX09ra2tru6unx5e2UAAADEdFJOUwD76wQqEgECCxHCNvoGBQ7rKMW4CTUj+QElIOj62KzlCvW3NAg\/trgP98XqwbmAgjTpOxP5BvOP6fk2C40dYPdi6+u49\/mo\/pbpvGnp5qy96raIubro3zGy6\/YjLNEMm7KTxecZ0851afubF0LFNrjsIeu+4pzyyo2sOXlEtetJbYOi6xNl6hTogXep8FhMlXnkur2BIN+q6mD4efLqE9czMfefmJLQrWS7q\/n4umdT7dyTw17gmeLGzdrhnLeUzuraAQF3\/egxAAAH00lEQVRo3r2ad2ATVRzHXw0lgtDKEAIyAhYpAorFFCsyRaYgIFKgLBkKAgIyFBDZG2XvJUPcey\/8I5e73PWS0qSU0ZGkLW2TSoEuKPCHv\/cuaZM0uWbc9cuVpsmFD5\/f7713d7kiFFyit587d0SL5M2mnY3a\/NVDXoamXURJSeZ+eSHzzudX3CjdIW+9Wi0tuWbKWdJYVki99gVWpmxJc3khw5J5+nrTh2WFNMGQK017y27Cyg55KJnXXZG5XPUeulo3ELYOIEz4kOhIRbg90czTiDMWv71v94HwyjW\/10\/rpoq8rp03OP7e1i86hVEu7abzJ7I2rxP7X2yKuFdecHv8xyGbaLbvzDfb9JMmi6m2LC+wW43jPwpxCEdtAwart\/yyRQQy9cs0u9VK6f26AITybxKzfXl+Ostaio8pRdemKTesBp7y6yLaE8225fl2mrMUjdoiOroUcW+mG3igzOwbNEQ9dnm+mWKB0aKWeaKIa2vm\/VNEGh8zNj4\/nWIzisa1qPXAGRX3ptnAM5TeJwUmo5+exLwfX2im6FLwUNU+56Pi2maBi9HYtW8Q5QKPQjPNZlwa10IZyMoS1altloG\/rPPl4g+CPdIpGjMCPMmI+oC4sD5cBMhT3hA1qVXgHmQsdmoLY4xh9TP7+2y8N4T0gwmO4XJhwKW\/qgaEu+4FUffqUIjH1aXXgmEg1BhcgGL0dvFVrhhgBFsrNxfqslHfdUR98XJhDzNNB+3hHGNmmC6cpwtZuzzKpXZ5hMAQRjLPMNhF67VAukHUFzqUZ8GaGBqDUKAvlz1cvE3AoxyvV6EyXC6kLyo3iNvoUr8BDJbUKuQT\/ahOs8EF+lJVMTK6qiDYIwt7jAnVo8qFwn2Zo6oJwR5Z2GNMi7AuWKLiwIUhLtVD+PoMAom5IIWH5xjrq6qa8QSiHgv9oImHCoWZKpeZuGL1hl1lADIV1yoePHTg0UeJwo5CmJVG\/fP9BQhbBhDwKDSzpFYqJEGwC8PDSH5+jmBS9p4m5kK8MD+mS+FBXN7BZxc6zrh5DkAogPQUep57aUcfFUJSUWbbGYoy2jb\/OBrP+H\/PdnB5SHixDS52A6zJeV81qqC4lEFnwIO2SOlBKJ9MSWeg+1xyBcU+sBfi+XFHUg8nxUxROhtvZzhLAcwPXKtgPKKicRrUTKR75v9wm+d1rIHX6\/HaXrTk9MaNJ0\/2FOK2X\/Xb8b+qFi4o5o9dPwHypFuauaVzs844HTvuW1oC65iOY\/LuMlCrO6f+Wbhw4UvOCLt2du4KWd1xNc6EQ2d310No24n4M881grR0pQ0kAW8JQtq0EZ5PSCsACksZKTaz1GpPPnr0ZZIE97h2diXh6KLxa9DS8rRku9mchXMRf+Fcc8b5wPWEw2Rg4DBG6xirwyHsB5vjGn7kcMBWIyZDdk7lNDQaGHCOxcDKwdDki6HhuxAab\/AHbzj4CYY8x8IP5HX8SvXfwqOqsGxqbkrRKLSw5Oo1Lk8fQFJLs\/NogmDzsrMzU\/WpED3eyKNU1ze3ZGaW5twfsha1Xrfg1EicZ10Z6MyAgQMgH0I2bHgXcjzXccNKsSBx12ipLD58eOLEiY\/CViOvkLyOs2fPe9PX9kYqTWxSYmJiD5LH3POCZ9ZMyU9zQM8ZWx6jg+E1auUjPvOEWxITJyf1Fj6B0yoDiPpQxC0Hy+Ya+TwLVN6YcfytQN6mDGbCRq+PuGWi2JwHdsr4IMMAlOxJb6mkXVWi345IM9FsblFpBcNVFrE8RXFAUUrKGBwB\/eByi2csggXy\/sE\/8AUfuKxSSupxywEel5bFbYXjSUrDHgusUDGuVEIXwQNqtSy2CUC4lIaNkxZYYR0zZg+SyiUSGLjnxZ\/GoiaPE5Pm2qS9VtL9QU8rpPQoXgZnWwBhwKQ50iZ1MzG4+5JQnB652INAKAJB2tZ7TTxNYxelFB5WzJhGTk1d5cJTuHU3ExwrJXCJbAe1ojEjFnlBMOU\/HvelS3gu0e2Ent90MjwgSAEuwhgLxyVSYORWMUjjdS4Ipjgo3P0wXBoAwwq1ujm06mNzDxOhLzx1F1dMEboHMHJuDo1FfiCYcpusY12eUYbsgfsx1O2CunoIu7vQuhBdfHn4gDhddFxmCC7VDI+POGpCkKp1d+gLZYOKKUJgUN4ePiHg0h1cOGOwLpG++uEPgl3+g77YMoNymedkDHkxFgUAqXbpFzjFOT+AUeNjQN8QhHBfgnJxrom+GKhJe+dS730fYFb32wycj4FLQH1psB7WEgYzfNweA4jHZPTqC2XL7LdKEYyHr1twGOLLBKH64ELRxoD6gs99\/DNEIAjNgr7odEAZUUvFNBcExtwXfd959dd4oS8rTAzNQfc\/F4d81wGPq7K5x\/zc3cVLPesHAi4rTDzLpVpGit2jQepvbjl4\/x4ItRIpF2TjCuvd1Iwr9\/eLXRb3XASX6zlz1\/rdR4AM93erXDt1l6H0SmXxKLHeK498fdHy\/bf+d6gFgrSaXf0eFB1cKd6U\/guWnUaiEFoMAlnz2ZKVtY1h8ZuhtZmQI3+4vxLQaimGvCrvry8AhK4LCGWrCxNbLT2RAJKMy6WoC4i8JosJZLhCZshVNi9luFJWyIE\/K\/Sp94fLykDq329kWO78LS8E\/Woquz7kZ5kh7\/xWeafpFpkhqM\/kybHBvud\/1hvMFvB\/+GMAAAAASUVORK5CYII="
                        ],
                        "maxSize": 30,
                        "launches": "1"
                    }
                },
                "garland": {
                    "init": false,
                    "options": {
                        "type": "apple",
                        "style": "style2"
                    }
                },
                "fireworks": {
                    "init": false,
                    "options": {
                        "delay": {
                            "max": 15,
                            "min": 10
                        },
                        "friction": 0.95
                    }
                }
            })
            newYearEvent.start()
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-player/1.4.3/lottie-player.js"></script>

    <script>
        function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1));
            var sURLVariables = sPageURL.split('&');
            var sParameterName;
            var i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        }

        var select_service_id = getUrlParameter("service");

        if (select_service_id) {
            var selectSerCatID = window.modules.siteOrder.services[select_service_id].cid;
            let orderCat = document.getElementById('orderform-category');
            let orderSer = document.getElementById('orderform-service');
            console.log("demo123" + selectSerCatID);

            $(function() {
                orderCat.querySelector('[selected]').removeAttribute('selected');
                console.log(selectSerCatID);
                orderCat.querySelector('[value="' + selectSerCatID + '"]').setAttribute('selected', 'selected');
                orderCat.value = selectSerCatID;

                var event = document.createEvent('HTMLEvents');
                event.initEvent('change', true, false);
                orderCat.dispatchEvent(event);

                setTimeout(() => {
                    let controlSel = orderSer.querySelector('[selected]')
                    if (controlSel) {
                        controlSel.removeAttribute('selected');
                    }
                    console.log(select_service_id);
                    orderSer.querySelector('[value="' + select_service_id + '"]').setAttribute('selected',
                        'selected');
                    orderSer.value = select_service_id;
                    orderSer.dispatchEvent(event);
                }, 500);
            });

        }
    </script>

    <script>
        function searchServices() {
            var searchTerm = $("#serv-inp").val();
            var listItem = $('#service-table tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {
                'containsi': function(elem, i, match, array) {
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "")
                        .toLowerCase()) >= 0;
                }
            });

            $("#service-table tbody tr").not(":containsi('" + searchSplit + "')").each(function(e) {
                $(this).addClass('hidden');
            });

            $("#service-table thead").not(":containsi('" + searchSplit + "')").each(function(e) {
                $(this).addClass('hidden');
            });

            $("#service-table tbody tr:containsi('" + searchSplit + "')").each(function(e) {
                $(this).removeClass('hidden');
            });
            $("#service-table thead:containsi('" + searchSplit + "')").each(function(e) {
                $(this).removeClass('hidden');
            });

            $("tr.separator:first-child, tr.separator:last-child").each(function(e) {
                $(this).removeClass('hidden');
            });
        }
    </script>
    <script>
        $("#serv-inp").keyup(function() {
            searchServices();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#testimonials_wrap').slick({
            dots: false,
            autoplay: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>
    <script>
        function showLang() {
            const lang = document.getElementById('drop_lang');
            lang.classList.toggle('active');
        }
    </script>



</body>

</html>
