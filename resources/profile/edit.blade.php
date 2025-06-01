@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4>Edit Profil</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', auth()->user()->nama) }}" required>
                </div>

                <!-- NIM -->
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" value="{{ old('nim', auth()->user()->nim) }}" required>
                </div>

                <!-- Jurusan -->
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', auth()->user()->jurusan) }}">
                </div>

                <!-- Fakultas -->
                <div class="mb-3">
                    <label for="fakultas" class="form-label">Fakultas</label>
                    <input type="text" name="fakultas" class="form-control" value="{{ old('fakultas', auth()->user()->fakultas) }}">
                </div>

                <!-- Foto Profil -->
                <div class="mb-3">
                    <label for="foto_profile" class="form-label">Foto Profil</label>
                    <input type="file" name="foto_profile" class="form-control">
                    @if (auth()->user()->foto_profile)
                        <small class="d-block mt-2">Foto saat ini:</small>
                        <img src="{{ asset('storage/' . auth()->user()->foto_profile) }}" alt="Foto Profil" class="img-thumbnail" width="120">
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-success">Update Profil</button>
            </form>
        </div>
    </div>
</div>
@endsection
