<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('img/digidibiwhite.png')}}" />
  </head>

  <body>
    <form action="/payment" method="GET">
      <h1>Bayar Midtrans</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="uname"><strong>Nama</strong></label>
        <input type="text" placeholder="Enter Name" name="name" required>
        <label for="uname"><strong>Email</strong></label>
        <input type="text" placeholder="Enter Email" name="email" required>
        <label for="uname"><strong>Nomor HP</strong></label>
        <input type="text" placeholder="Enter No HP" name="nohp" required>
      </div>
      <button type="submit">Login</button>
      <div class="container" style="background-color: #eee">
        <label style="padding-left: 15px">
        <input type="checkbox"  checked="checked" name="remember"> Remember me
        </label>
        <span class="psw"><a href="#"> Forgot password?</a></span>
      </div>
    </form>
    @if(session('alert-success'))
    <script>
    	alert("{{session('alert-success')}}");
    </script>
    @elseif(session('alert-failed'))
    <script>
    	alert("{{session('alert-failed')}}");
    </script>
    @endif
  </body>
</html>

