@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-uppercase tracking-widest">Galeri</h2>
        @auth
        <a href="{{ route('galeri.create') }}" class="btn btn-dark rounded-0">Tambah Foto</a>
        @endauth
    </div>

    @if(session('success'))
    <div class="alert alert-success rounded-0">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($fotos as $foto)
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm rounded-0">
                <a href="{{ route('galeri.show', $foto->fotoID) }}">
                    <img src="{{ asset('storage/photos/' . $foto->lokasiFile) }}" class="card-img-top rounded-0" alt="{{ $foto->judulFoto }}" style="height: 250px; object-fit: cover;">
                </a>

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h3 class="m-0 fw-bold text-uppercase h5">{{ $foto->judulFoto }}</h3>

                        <div class="d-flex align-items-center">
                            {{-- LOGO KOMENTAR --}}
                            <div class="d-flex align-items-center me-3 text-secondary">
                                <a href="{{ route('galeri.show', $foto->fotoID) }}" class="text-decoration-none text-secondary">
                                    <i class="bi bi-chat fs-5"></i>
                                    <span class="ms-1 fw-bold small">{{ $foto->komentars()->count() }}</span>
                                </a>
                            </div>

                            {{-- LOGO LIKE --}}
                            <div class="d-flex align-items-center text-danger">
                                @auth
                                <form action="{{ route('like.toggle', $foto->fotoID) }}" method="POST" class="d-inline p-0 m-0 border-0 bg-transparent">
                                    @csrf
                                    <button type="submit" class="btn p-0 m-0 border-0 bg-transparent text-danger shadow-none">
                                        @if($foto->isLikedByUser())
                                        <i class="bi bi-heart-fill fs-5"></i>
                                        @else
                                        <i class="bi bi-heart fs-5"></i>
                                        @endif
                                    </button>
                                </form>
                                @else
                                <i class="bi bi-heart text-muted fs-5"></i>
                                @endauth

                                <span class="ms-1 fw-bold small">{{ $foto->likes()->count() }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-end mt-3 pt-2 border-top">
                        <div class="btn-group">
                            <a href="{{ route('galeri.show', $foto->fotoID) }}" class="btn btn-sm btn-outline-dark rounded-0">Detail</a>

                            @auth
                            @if(Auth::user()->role == 'admin')
                            <a href="{{ route('galeri.edit', $foto->fotoID) }}" class="btn btn-sm btn-outline-primary rounded-0">Edit</a>
                            <form action="{{ route('galeri.destroy', $foto->fotoID) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-0">Hapus</button>
                            </form>
                            @endif
                            @endauth
                        </div>
                        <div class="text-end">
                            <p class="mb-0 text-muted small" style="font-size: 0.7rem;">Oleh: {{ $foto->user->namaLengkap }}</p>
                            <small class="text-muted" style="font-size: 0.7rem;">{{ $foto->tanggalUnggah }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection