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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom px-3 fixed-top">
        <div class="d-flex align-items-center w-100 mt-1">
            <a class="navbar-brand me-3" href="{{ route('dashboard') }}" style="margin-left: 50px;">
                <img src="{{ asset('images/Logo.png') }}" alt="Tel- Arc" style="width: 85px;height: 40px;">
            </a>

            <div style="padding-left: 60rem;" class="d-flex align-items-center ms-2">
                <a href="#" class="btn btn-link text-decoration-none me-2"><i class="bi bi-house-fill fs-5 text-dark"></i></a>
                <a href="#" class="btn btn-link text-decoration-none me-2 position-relative"><i class="bi bi-bell-fill fs-5 text-dark"></i></a>
                <a href="#" class="btn btn-link text-decoration-none me-2"><i class="bi bi-chat-dots-fill fs-5 text-dark"></i></a>

                <div class="profile">
                    <a class="user" href="#">
                        <img src="{{ asset('images/user.png') }}" alt="profile" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                    </a>
                </div>

                <form action="{{ route('logout') }}" style="padding-left: 20px;" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">LogOut</button>
                </form>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Jumbotron -->
    <div class="p-5 text-center bg-image" style="background-image: url('/images/bg-telkom.webp'); height: 770px;">
        <div class="mask rounded-3" style="background-color: rgba(0, 0, 0, 0.6); margin-top: 50px;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <img src="{{ asset('images/Logo.png') }}" class="rounded-5" alt="" style="margin-top: 20px;">
                    <p style="margin-top: 10px;">
                        TelU Arc is a dedicated platform for archiving student works from Telkom University. From final projects to creative innovations, 
                        every piece is preserved, accessible, and celebrated. Discover, 
                        share, and be inspired by the academic and creative achievements of the Tel-U community.
                    </p>
                    <div class="fotoContoh d-flex justify-content-center gap-5">
                        <img src="{{ asset('images/foto-desaingrafis.jpg') }}" style="width: 500px; height: 300px;" class="rounded-5">
                        <img src="{{ asset('images/foto-webdev.jpg') }}" style="width: 500px; height: 300px;" class="rounded-5">
                    </div>
                    <a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="#!" role="button" style="margin-top: 20px; margin-bottom: 20px;">Show</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tampilan karya -->
    <div class="p-5 bg-image" style="background-color: white; min-height: 770px;">
        <h1 style="margin-top: 20px; padding-left: 5rem; font-size: 30px;">Libraries:</h1>
        <div class="container mt-4">
            <div class="row justify-content-start">
                <!-- Add karya card -->
                <div class="col-md-3 mb-4">
                    <a href="{{ route('karya.create') }}" class="text-decoration-none text-dark">
                        <div class="d-flex flex-column align-items-center border rounded p-4 h-100">
                            <div class="add-karya-card d-flex align-items-center justify-content-center"
                                style="width: 100%; height: 200px; border: 2px dashed #ccc; border-radius: 10px;">
                                <span class="plus-sign display-4">+</span>
                            </div>
                            <label class="mt-3 text-center">Add your work here!</label>
                        </div>
                    </a>
                </div>

                @foreach($karyas as $karya)
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('storage/' . $karya->gambar) }}" class="card-img-top" alt="Gambar Karya">

                        <div class="card-body">
                            <p class="mb-1">
                                <span class="ms-1 fw-bold text-success">{{ $karya->user->nama ?? 'Nama Tidak Diketahui' }}</span>
                            </p>
                            <p class="fw-semibold">{{ $karya->deskripsi }}</p>
                            <p><i class="bi bi-calendar-event me-1"></i>{{ $karya->created_at->format('d M Y') }}</p>
                        </div>

                        <div class="card-footer bg-white border-top-0 d-flex gap-2 flex-wrap">
                            <a href="{{ $karya->link }}" target="_blank" class="btn btn-danger flex-grow-1">
                                <i class="bi bi-box-arrow-up-right me-1"></i> View
                            </a>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#commentModal{{ $karya->id }}">
                                <i class="bi bi-chat-dots"></i> Comment
                            </button>

                            <form action="{{ route('reports.store') }}" method="POST" onsubmit="return confirm('Yakin ingin melaporkan karya ini?');">
                                @csrf
                                <input type="hidden" name="karya_id" value="{{ $karya->id }}">
                                <button type="submit" class="btn btn-warning text-white">
                                    <i class="bi bi-flag"></i> Report
                                </button>
                            </form>

                            @auth
                                @if($karya->user_id === auth()->id())
                                    <a href="{{ route('karya.edit', $karya->id) }}" class="btn btn-warning text-white">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="{{ route('karya.destroy', $karya->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus karya ini?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="commentModal{{ $karya->id }}" tabindex="-1" aria-labelledby="commentModalLabel{{ $karya->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST">
                    @csrf
                    <input type="hidden" name="karya_id" value="{{ $karya->id }}">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="commentModalLabel{{ $karya->id }}">Comment on this Karya</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <textarea name="comment" class="form-control" rows="4" placeholder="Tulis komentar kamu..." required></textarea>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</body>
</html>
>>>>>>> origin/bagaskara
