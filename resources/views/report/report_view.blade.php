@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Daftar Laporan Karya</h2>
    <div class="table-responsive shadow-sm p-3 bg-white rounded">
        <table class="table table-bordered align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Reporter</th>
                    <th>Judul Karya</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Waktu Submit</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reports as $index => $report)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $report->user->name }}</td>
                    <td>{{ $report->judul }}</td>
                    <td>{{ Str::limit($report->alasan, 50) }}</td>
                    <td>
                        <a href="{{ asset('storage/reports/' . $report->file) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat File</a>
                    </td>
                    <td>{{ $report->created_at->format('d M Y, H:i') }}</td>
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
@endsection
