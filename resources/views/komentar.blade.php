{{-- Komentar --}}
<div class="card mb-3">
    <div class="card-header">
        <h5>Komentar</h5>
    </div>
    <div class="card-body">
        {{-- Form Kirim Komentar --}}
        @auth
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="karya_id" value="{{ $karya->id }}">
                <div class="mb-3">
                    <textarea name="content" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        @else
            <p>Silakan <a href="{{ route('login') }}">login</a> untuk memberikan komentar.</p>
        @endauth
    </div>
</div>

{{-- Daftar Komentar --}}
@forelse ($karya->comments->sortByDesc('created_at') as $comment)
    <div class="card mb-2">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <strong>{{ $comment->user->name }}</strong>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </div>
            <p>{{ $comment->content }}</p>

            {{-- Tombol Edit & Hapus --}}
            @can('update', $comment)
                <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <textarea name="content" class="form-control mb-2" rows="2">{{ $comment->content }}</textarea>
                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                </form>
            @endcan

            @can('delete', $comment)
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus komentar ini?')">Hapus</button>
                </form>
            @endcan
        </div>
    </div>
@empty
    <p>Belum ada komentar.</p>
@endforelse
