<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            background-image: url('/images/bg.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
    </head>
<body>

    <!--main container-->
    <div class="container d-flex justify-content-center align-items-center min-vh-100" id="cont">


    <!--login container-->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--bbox kiri-->
        <div class="col-md-6 rounded-5 d-flex justify-content-center align-items-center flex-column left-box" style="background: white;">
            <div class="featured-image mb-3">
                <img src="{{ asset('images/Logo.png') }}" class="img-fluid rounded-bottom-5" style="width: 250px;">
            </div>
            <p class="text-black fs-2" style="font-weight: 600; padding-top: 10px;">Hey There!</p>
        </div>  
    <!--box kanan-->
        <div class="col-md-6">

            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                <div class="row align-items-center">
                    <div class="header-text  mt-3">
                        <p>Enter your data.</p>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="name" placeholder="Name " >
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="nim" placeholder="NIM ">
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-lg bg-light fs-6" name="email" placeholder="Email address ">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="Password ">
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Sign In</button>
                    </div>
                    <div class="row">
                        <small>Have a account? <a href="{{ route('login') }}">Log In</a></small>
                    </div>
                </div>
            </form>
            

        </div>  

        </div>

    </div>
</body>
</html>
