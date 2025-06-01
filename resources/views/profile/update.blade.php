<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/styleDashboard.css') }}">
        <style>
            body {
                background-image: url('/images/bg-register.jpg'); /* ganti sesuai bg lo */
                background-size: cover;
                background-position: center;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .form-box {
                background: white;
                border-radius: 20px;
                box-shadow: 0 4px 30px rgba(0,0,0,0.1);
                padding: 40px;
                max-width: 800px;
                width: 100%;
                display: flex;
                gap: 40px;
            }

            .photo-box {
                flex: 1;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            .photo-box img {
                width: 180px;
                height: 180px;
                border-radius: 50%;
                object-fit: cover;
                border: 3px solid #ddd;
            }

            .form-inputs {
                flex: 2;
            }

            .btn-update {
                background-color: #007bff;
                color: white;
                font-weight: bold;
            }

            .btn-update:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
            <nav class=" navbar navbar-expand-lg navbar-light navbar-custom px-3 fixed-top">
                <div class="d-flex align-items-center w-100 mt-1">
                    <!-- logo -->
                    <a class="navbar-brand me-3" href="{{ route('dashboard') }}" style="margin-left: 50px;" >
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
                            <<a class="user" href="{{ route('profile.show') }}">
                                <img 
                                    src="{{ Auth::user()->foto_profile ? asset('storage/' . Auth::user()->foto_profile) : asset('images/user.png') }}" 
                                    alt="profile" 
                                    class="rounded-circle" 
                                    style="width: 30px; height: 30px; object-fit: cover;"
                                >
                            </a>
                        </div>
                        <form action="{{ route('logout') }}" style="padding-left: 20px;" method="POST" >
                            @csrf
                            <button type="submit" class="btn btn-danger"  >LogOut</button>
                        </form>
                        
                    </div>
                </div>
            </nav>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="form-box">
        @csrf
        <div class="photo-box">
            <img id="preview" src="{{ $user->foto_profile ? asset('storage/' . $user->foto_profile) : asset('images/user.png') }}" alt="Foto Profil">
            <input type="file" name="foto_profile" accept="image/*" onchange="previewImage(this)">
        </div>

        <div class="form-inputs">
            <h3 class="mb-4">Edit Profile</h3>

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" id="nim" class="form-control" value="{{ $user->nim }}" required>
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ $user->jurusan }}">
            </div>

            <div class="mb-4">
                <label for="fakultas" class="form-label">Fakultas</label>
                <input type="text" name="fakultas" id="fakultas" class="form-control" value="{{ $user->fakultas }}">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('profile.show') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-update">Update</button>
            </div>
        </div>
    </form>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => preview.src = e.target.result;
                reader.readAsDataURL(file);
            }
        }
    </script>

    </body>
</html>
