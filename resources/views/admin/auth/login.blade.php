<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in Admin</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('image/logohub.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('image/logohub.png') }}" width="100" alt="">
                                </a>
                                <p class="text-center">Sign in</p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"
                                        style="font-size: 15px; color:red" />

                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2"
                                        style="font-size: 15px; color:red" />

                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" name="remember"
                                                value="1" id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Remeber this Device
                                            </label>
                                        </div>
                                        <a class="text-primary fw-bold" href="{{ route('password.request') }}">Forgot
                                            Password ?</a>
                                    </div>
                                    <div class="g-recaptcha form-group"
                                        data-sitekey="6Lc3H4EpAAAAAElaf2E2Qa1yhQeusnTiRTGX7Wj6"></div>
                                    @if ($errors->has('captcha'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('captcha') }}
                                        </div>
                                    @endif

                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                        In</button>
                                    {{-- <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                    <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Create an account</a>
                  </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
