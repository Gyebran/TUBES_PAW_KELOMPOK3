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
        <nav class=" navbar navbar-expand-lg navbar-light navbar-custom px-3 fixed-top">
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

        <!--jumbotron-->
        <div class="p-5 text-center bg-image" style="
            background-image: url('/images/bg-telkom.webp');
            height: 770px;
            ">
            <div class="mask rounded-3" style="background-color: rgba(0, 0, 0, 0.6); margin-top: 50px; ">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white">
                        <img src="{{ asset('images/Logo.png') }}" class="rounded-5" alt="" style="margin-top: 20px;" >
                        <p style="margin-top: 10px;">TelU Arc is a dedicated platform for archiving student works from Telkom University. From final projects to creative innovations, 
                            every piece is preserved, accessible, and celebrated. Discover, 
                            share, and be inspired by the academic and creative achievements of the Tel-U community.
                        </p>
                        <div class="fotoContoh d-flex justify-content-center gap-5">
                            <img src="{{ asset('images/foto-desaingrafis.jpg') }}" style="width: 500px; height: 300px;" class="rounded-5" >
                            <img src="{{ asset('images/foto-webdev.jpg') }}" style="width: 500px; height: 300px;" class="rounded-5">
                        </div>
                        <a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="#!" role="button" style="margin-top: 20px; margin-bottom: 20px; " >Show</a>
                    </div>
                </div>
            </div>
        </div>

        <!--tampilan karya-->
        <div class="p-5 bg-image" style="background-color: white; height: 770px;">
        <h1 style="margin-top: 20px; padding-left: 5rem; font-size: 30px;">Libraries:</h1>

        <div class="container mt-4">
            <div class="row justify-content-start">

            <div class="col-md-3 mb-4">
                <div class="d-flex flex-column align-items-center border rounded p-4 h-100">
                <div class="add-karya-card d-flex align-items-center justify-content-center" style="width: 100%; height: 200px; border: 2px dashed #ccc; border-radius: 10px;">
                    <span class="plus-sign display-4">+</span>
                </div>
                <label class="mt-3 text-center">Add your work here!</label>
                </div>
            </div>

            <!-- card library -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm h-100">
                <img src="https://via.placeholder.com/288x300?text=Gambar+Seminar" class="card-img-top" alt="Poster Seminar">
                <div class="card-body">
                    <p class="mb-1">
                    <span class="ms-1 fw-bold text-success">Nama Orang</span>
                    </p>
                    <p class="fw-semibold">
                    Seminar Nasional Mahasiswa :<br>Fakultas Teknologi Informasi - Metaverse
                    </p>
                    <p><i class="bi bi-calendar-event me-1"></i>21 Maret 2025</p>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <button class="btn btn-danger w-100">
                    <i class="bi bi-calendar-check me-1"></i>Daftar
                    </button>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>


  </body>
</html>