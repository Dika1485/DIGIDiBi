<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DIGIDiBi - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('img/digidibiwhite.png')}}" />

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
    	<div class=" col-xl-7 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!--<div class="col-lg-5 d-none d-lg-block">
                    	<img src="{{asset('img/dig3.png')}}">
                    </div>
                    bg-register-image-->
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <x-slot name="logo">
                                <x-jet-authentication-card-logo />
                            </x-slot>
                            <x-jet-validation-errors class="mb-4 text-danger" />
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <!--<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                        placeholder="Enter Email Address..." name="email" :value="old('email')" required autofocus autocomplete="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username"
                                        placeholder="Username" name="username" :value="old('username')" required autocomplete="username">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" placeholder="Password" name="password" required autocomplete="new-password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="repeatpassword" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama"
                                        placeholder="Laundry Name" name="laundryname" :value="old('laundryname')" required autocomplete="laundryname">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control form-control-user" id="nohp"
                                        placeholder="Phone Number" name="phonenumber" :value="old('phonenumber')" required autocomplete="phone">
                                </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control form-control-user" id="alamat"
                                        placeholder="Address" name="address" :value="old('address')" required autocomplete="address"></textarea>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    {{ __('Register Account') }}
                                </button>
<!--                                <hr>-->
<!--                                <a href="index.html" class="btn btn-google btn-user btn-block">-->
<!--                                    <i class="fab fa-google fa-fw"></i> Register with Google-->
<!--                                </a>-->
<!--                                <a href="index.html" class="btn btn-facebook btn-user btn-block">-->
<!--                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook-->
<!--                                </a>-->
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="/forgot-password">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="/login">Already have an account? Login!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/check">Check Laundry Order Progress</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

</body>

</html>
