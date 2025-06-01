
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporkan Karya</title>
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

        textarea {
            resize: none;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row border rounded-5 p-3 bg-white shadow box-area">

        <!-- kiri -->
        <div class="col-md-6 rounded-5 d-flex justify-content-center align-items-center flex-column left-box" style="background: white;">
            <div class="featured-image mb-3">
                <img src="{{ asset('images/Logo.png') }}" class="img-fluid rounded-bottom-5" style="width: 250px;">
            </div>
            <p class="text-black fs-2 fw-semibold" style="padding-top: 10px;">Laporkan Karya Ini</p>
        </div>

        <!-- kanan -->
        <div class="col-md-6">

            <form action="{{ route('reports.store') }}" method="POST" class="p-2">
                
                <input type="hidden" name="karya_id" value="{{ $karya_id }}">

                <div class="row align-items-center">
                    <div class="header-text mt-3 mb-4">
                        <p class="fs-6 text-muted">Kenapa kamu ingin melaporkan karya ini?</p>
                    </div>

                    <div class="mb-4">
                        <label for="alasan" class="form-label fw-semibold">Alasan Laporan</label>
                        <textarea class="form-control bg-light fs-6 p-3 rounded-3" name="alasan" id="alasan" rows="5" placeholder="Tulis alasannya dengan jelas ya..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-lg btn-danger w-100 fs-6">Kirim Laporan</button>
                    </div>

                    <div class="text-center">
                        <a href="{{ url()->previous() }}" class="text-decoration-none text-muted">
                            <i class="bi bi-arrow-left-circle me-1"></i> Batal dan Kembali
                        </a>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>

</body>
</html>