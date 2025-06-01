@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Saya</title>
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
        .badge {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container min-vh-100 d-flex flex-column justify-content-center py-5">
    <h2 class="mb-4 text-center fw-bold text-dark">Laporan Saya</h2>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr class="text-center fw-semibold">
                        <th>No</th>
                        <th>Judul Karya</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Ditangani Oleh</th>
                        <th>Waktu Submit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $index => $report)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $report->karya->judul ?? '-' }}</td>
                        <td>{{ Str::limit($report->alasan, 50) }}</td>
                        <td class="text-center">
                            @if ($report->status === 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif ($report->status === 'diterima')
                                <span class="badge bg-success">Diterima</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                        <td class="text-center">{{ $report->handler->name ?? '-' }}</td>
                        <td class="text-center">{{ $report->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada laporan.</td>
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
