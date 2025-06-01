<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Karya</title>
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
                    <h4 class="mt-3">Edit Karya</h4>
                </div>

                <form action="{{ route('karya.update', $karya->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Ganti Gambar (kosongkan jika tidak ingin ganti)</label>
                        <input type="file" class="form-control" name="gambar" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link Karya</label>
                        <input type="url" class="form-control" name="link" value="{{ old('link', $karya->link) }}" placeholder="https://">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required>{{ old('deskripsi', $karya->deskripsi) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Karya</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary w-100 mt-2">Batal</a>

                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
