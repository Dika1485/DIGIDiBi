<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DIGIDiBi - Check</title>

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
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!--<div class="col-lg-6 d-none d-lg-block">
                            	<img src="{{asset('img/dig3.png')}}">
                            </div>
                            bg-login-image-->
                            <div class="col-lg">
                                @foreach($pesanan as $pesanan)
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Check Laundry Order Progress</h1>
                                    <form class="user" method="GET" action="/check">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Order ID..." name="id" value="{{$pesanan->check_id}}" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <!-- <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                                <label class="custom-control-label" for="customCheck">{{ __('Remember me') }}</label> -->
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Check Now
                                        </button>
                                       <hr>
                                       <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                           <i class="fab fa-google fa-fw"></i> Login with Google
                                       </a>
                                       <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                           <i class="fab fa-facebook-f fa-fw"></i> Login with facebook
                                        </a> -->
                                            <div class="table-responsive">
                                                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <th>ID</th>
                                                            <td>:</td>
                                                            <td>{{$pesanan->check_id}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Package Type</th>
                                                            <td>:</td>
                                                            <td>{{$pesanan->namapaket}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Customer Name</th>
                                                            <td>:</td>
                                                            <td>{{$pesanan->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phone Number</th>
                                                            <td>:</td>
                                                            <td>{{$pesanan->phonenumber}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Address</th>
                                                            <td>:</td>
                                                            <td>{{$pesanan->address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Weight</th>
                                                            <td>:</td>
                                                            <td>{{$pesanan->weight}} Kg</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Price</th>
                                                            <td>:</td>
                                                            <td>Rp. {{number_format($pesanan->price*$pesanan->weight,2,',','.')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shuttle</th>
                                                            <td>:</td>
                                                            <td>{{$pesanan->isshuttle==1?"Yes":"No"}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Time Estimation</th>
                                                            <td>:</td>
                                                            <td>{{$pesanan->timeestimation}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Time Order</th>
                                                            <td>:</td>
                                                            <td>{{$pesanan->timeorder}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Time Finish</th>
                                                            <td>:</td>
                                                            <td>{{$pesanan->timefinish}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <th>Progress</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- <tfoot>
                                                        <tr>
                                                            <th>Time</th>
                                                            <th>Progress</th>
                                                        </tr>
                                                    </tfoot> -->
                                                    <tbody>
                                                        @foreach($progres as $progres)
                                                        <tr>
                                                            <td>{{$progres->time}}</td>
                                                            <td>{{$progres->progress}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/login">Login DIGIDiBi Account</a>
                                    </div>
                                </div>
                                @endforeach
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
