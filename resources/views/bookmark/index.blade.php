<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookmark</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/styleDashboard.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom px-3 fixed-top">
        <div class="d-flex align-items-center w-100 mt-1">
            <a class="navbar-brand me-3" href="/dashboard" style="margin-left: 50px;">
                <img src="{{ asset('images/Logo.png') }}" alt="Tel-Arc" style="width: 85px;height: 40px;">
            </a>
            <div style="padding-left: 60rem;" class="d-flex align-items-center ms-2">
                <a href="/dashboard" class="btn btn-link text-decoration-none me-2"><i class="bi bi-house-fill fs-5 text-dark"></i></a>
                <a href="#" class="btn btn-link text-decoration-none me-2 position-relative">
                    <i class="bi bi-bell-fill fs-5 text-dark"></i>
                </a>
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

    <!-- Bookmark Content -->
    <div class="container" style="padding-top: 100px;">
        <h2 class="mb-4 text-center">Bookmark Kegiatan</h2>

        <div id="bookmark-container" class="row justify-content-start">
            <p id="empty-message" class="text-center text-muted d-none">Belum ada kegiatan yang dibookmark.</p>
        </div>

        <div class="text-center mt-4">
            <a href="/dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('/api/bookmark')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('bookmark-container');
                    const emptyMsg = document.getElementById('empty-message');

                    if (data.length === 0) {
                        emptyMsg.classList.remove('d-none');
                        return;
                    }

                    data.forEach(bookmark => {
                        const col = document.createElement('div');
                        col.className = 'col-md-4 mb-4';

                        col.innerHTML = `
                            <div class="card h-100 shadow-sm">
                                <img src="${bookmark.poster ?? 'https://via.placeholder.com/300x200?text=Kegiatan'}" class="card-img-top" alt="Poster Kegiatan">
                                <div class="card-body">
                                    <h5 class="card-title">${bookmark.nama_kegiatan}</h5>
                                    <p class="card-text">${bookmark.deskripsi ?? '-'}</p>
                                    <p class="card-text"><i class="bi bi-calendar-event me-1"></i>${bookmark.tanggal ?? '-'}</p>
                                </div>
                                <div class="card-footer bg-white border-top-0">
                                    <button class="btn btn-outline-danger w-100" onclick="hapusBookmark(${bookmark.id})">
                                        <i class="bi bi-bookmark-x"></i> Hapus Bookmark
                                    </button>
                                </div>
                            </div>
                        `;

                        container.appendChild(col);
                    });
                })
                .catch(error => {
                    console.error('Gagal memuat bookmark:', error);
                });
        });

        function hapusBookmark(id) {
            if (!confirm('Yakin ingin menghapus bookmark ini?')) return;

            fetch(`/api/bookmark/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(res => {
                if (res.ok) {
                    location.reload();
                } else {
                    alert('Gagal menghapus bookmark');
                }
            })
            .catch(err => console.error('Gagal:', err));
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
