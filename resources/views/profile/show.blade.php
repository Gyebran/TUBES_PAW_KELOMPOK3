<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/styleDashboard.css') }}">
        <style>
            body {
            background-image: url('/images/bg-register.jpg'); /* ganti dengan background pilihanmu */
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
            .info-box {
            flex: 2;
            }
            .info-field {
            margin-bottom: 20px;
            }
            .info-field label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            }
            .info-field p {
            margin: 0;
            padding: 8px 12px;
            background: #f2f2f2;
            border-radius: 4px;
            }
            .btn-edit {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            }
            .btn-edit:hover {
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
        <div class="form-box">
            <div class="photo-box">
                <img 
                src="{{ $user->foto_profile ? asset('storage/' . $user->foto_profile) : asset('images/user.png') }}" 
                alt="Profile Picture"
                >
            </div>
            <div class="info-box">
                <div class="info-field">
                    <label>Nama</label>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="info-field">
                    <label>NIM</label>
                    <p>{{ $user->nim }}</p>
                </div>
                <div class="info-field">
                    <label>Jurusan</label>
                    <p>{{ $user->jurusan }}</p>
                </div>
                <div class="info-field">
                    <label>Fakultas</label>
                    <p>{{ $user->fakultas }}</p>
                </div>
                <div class="info-field">
                    <label>Email</label>
                    <p>{{ $user->email }}</p>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('profile.edit') }}" class="btn-edit">Edit</a>
                </div>
            </div>
        </div>
    </body>
</html>