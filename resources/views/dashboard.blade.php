<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/styleDashboard.css') }}">
  </head>
  <body>
        <nav class="navbar navbar-light navbar-custom px-3">
            <div class="d-flex align-items-center w-100 mt-1">
                <!-- logo -->
                <a class="navbar-brand me-3" href="dashboard" style="margin-left: 50px;" >
                    <img src="{{ asset('images/Logo.png ') }}" alt="Tel- Arc" style="width: 85px;height: 40px;">
                </a>

                <!-- icon & profile -->
                <div style="padding-left: 60rem;" class="d-flex align-items-center ms-2">
                    <a href="#" class="btn btn-link text-decoration-none me-2 "><i class="bi bi-house-fill fs-5 text-dark"></i></a>
                    <a href="#" class="btn btn-link text-decoration-none me-2 position-relative">
                        <i class="bi bi-bell-fill fs-5 text-dark"></i>
                    </a>
                    <a href="#" class="btn btn-link text-decoration-none me-2"><i class="bi bi-chat-dots-fill fs-5 text-dark"></i></a>

                    <!-- profile dropdown -->
                    <div class="profile">
                        <a class="user" href="#" >
                            <img src="{{ asset('images/user.png') }}" alt="profile" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;" >
                        </a>
                    </div>
                    <form action="{{ route('logout') }}" style="padding-left: 20px;" method="POST" >
                        @csrf
                        <button type="submit" class="btn btn-danger"  >LogOut</button>
                    </form>
                    
                </div>
            </div>
        </nav>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!--plus tambahin karya-->
        <div class="d-flex" style="padding-left: 5rem; margin-top: 5rem; ">
            <div class="d-flex flex-column align-items-center">
                <div class="add-karya-card">
                    <span class="plus-sign">+</span>
                </div>
                <label style="margin-top: 5px;">Add your work here!</label>
            </div>
        </div>


  </body>
</html>