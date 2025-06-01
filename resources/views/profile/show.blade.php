@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-info text-white">
            <h4>Profil Saya</h4>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->nama }}</p>
            <p><strong>NIM:</strong> {{ $user->nim }}</p>
            <p><strong>Jurusan:</strong> {{ $user->jurusan }}</p>
            <p><strong>Fakultas:</strong> {{ $user->fakultas }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            @if ($user->foto_profile)
                <p><strong>Foto Profil:</strong></p>
                <img src="{{ asset('storage/' . $user->foto_profile) }}" alt="Foto Profil" class="img-thumbnail" width="150">
            @endif

            <a href="{{ route('profile.update') }}" class="btn btn-warning mt-3">Edit Profil</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
        </div>
    </div>
</div>
@endsection
