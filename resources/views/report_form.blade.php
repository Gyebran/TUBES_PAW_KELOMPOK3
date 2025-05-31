@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Laporkan Karya</h2>
    <div class="card shadow p-4">
        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="karya_id" value="{{ $karya_id }}">

            <div class="mb-3">
                <label for="alasan" class="form-label">Alasan Laporan</label>
                <textarea class="form-control" id="alasan" name="alasan" rows="4" placeholder="Tulis alasan mengapa kamu melaporkan karya ini..." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Kirim Laporan</button>
        </form>
    </div>
</div>
@endsection
