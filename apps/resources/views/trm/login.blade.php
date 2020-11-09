<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Transmission Development Apps</title>
  <!--<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">-->
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="assets/login/normalize.min.css">
<link rel="stylesheet" href="assets/login/login.css">
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>-->
<script src="assets/login/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>

<div id="mainButton">
  <div class="btn-text" onclick="openForm()">Sign In</div>

  <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data" data-toggle="validator">
    @csrf
  <div class="modal">
    <div class="close-button" onclick="closeForm()">x</div>
    <img src="assets/login/logo_ibs.png" style="top: 20px; position: absolute;">
    <div class="form-title">Please Sign In</div>
    <div class="input-group">
      <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" onblur="checkInput(this)" required="" />
      <label for="name">Username</label>
    </div>
    <div class="input-group">
      <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" onblur="checkInput(this)" required="" />
      <label for="password">Password</label>
    </div>
    <button type="submit" class="form-button">Log In</button>
  </div>
  </form>
</div>
<div class="codepen-by">Need an account ? Please <a href="{{ route('register')}}">register</a></div>
<div class="validation-error">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
</div>
<!-- partial -->
  <script  src="assets/login/login.js"></script>

</body>
</html>