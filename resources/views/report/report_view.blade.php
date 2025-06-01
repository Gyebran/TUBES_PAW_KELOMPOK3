@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Laporan Karya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/bg.jpg');
            background-size: cover;
            background-position: center;
        }
        .table-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 2rem;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table thead {
            background-color: #e3f2fd;
        }
    </style>
</head>
<body>

<div class="container min-vh-100 d-flex flex-column justify-content-center py-5">
    <h2 class="mb-4 text-center fw-bold text-dark">Daftar Laporan Karya</h2>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr class="text-center fw-semibold">
                        <th>No</th>
                        <th>Reporter</th>
                        <th>Judul Karya</th>
                        <th>Alasan</th>
                        <th>File</th>
                        <th>Waktu Submit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $index => $report)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $report->user->name }}</td>
                        <td>{{ $report->judul }}</td>
                        <td>{{ Str::limit($report->alasan, 50) }}</td>
                        <td class="text-center">
                            <a href="{{ asset('storage/reports/' . $report->file) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat File</a>
                        </td>
                        <td>{{ $report->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada laporan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
@endsection
