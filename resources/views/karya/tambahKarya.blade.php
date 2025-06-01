<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Karya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/bg.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card shadow p-4">
                <div class="text-center mb-3">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo" style="width: 150px;">
                    <h4 class="mt-3">Upload Karya</h4>
                </div>

                <form action="{{ route('karya.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Karya</label>
                        <input type="file" class="form-control" name="gambar" required>
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link (opsional)</label>
                        <input type="url" class="form-control" name="link" placeholder="https://">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Simpan Karya</button>

                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    @if(isset($karyas) && $karyas->count())
    <div class="row mt-5">
        <h4 class="mb-3">Karya Anda</h4>
        @foreach($karyas as $karya)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $karya->gambar) }}" class="card-img-top" alt="Karya">
                    <div class="card-body">
                        <p class="card-text">{{ $karya->deskripsi }}</p>
                        @if($karya->link)
                            <a href="{{ $karya->link }}" target="_blank" class="btn btn-sm btn-primary">Lihat Karya</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>

</body>
</html>
