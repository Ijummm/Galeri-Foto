@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="mb-4">
        <h2 class="text-uppercase fw-bold">Foto yang Disukai</h2>
        <p class="text-muted small">Koleksi karya seni yang menginspirasi Anda.</p>
        <hr class="w-25">
    </div>

    <div class="row">
        @forelse($likedPhotos as $foto)
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm rounded-0">
                <a href="{{ route('galeri.show', $foto->fotoID) }}">
                    <img src="{{ asset('storage/photos/' . $foto->lokasiFile) }}" 
                         class="card-img-top rounded-0" 
                         alt="{{ $foto->judulFoto }}" 
                         style="height: 250px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title m-0 fw-bold small text-uppercase">{{ $foto->judulFoto }}</h5>
                        
                        {{-- Tombol Like Minimalis --}}
                        <div class="d-flex align-items-center">
                            <form action="{{ route('like.toggle', $foto->fotoID) }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="btn p-0 border-0 bg-transparent shadow-none">
                                    <i class="bi bi-heart-fill" style="color: #d1d1f0; font-size: 1.1rem;"></i>
                                </button>
                            </form>
                            <span class="ms-1 fw-bold small" style="color: #c08497;">
                                {{ $foto->likes->count() }}
                            </span>
                        </div>
                    </div>
                    <p class="text-muted small mb-0">Oleh: {{ $foto->user->namaLengkap }}</p>
                    <a href="{{ route('galeri.show', $foto->fotoID) }}" class="btn btn-dark btn-sm rounded-0 mt-3 w-100">LIHAT DETAIL</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-heart text-light" style="font-size: 4rem;"></i>
            <p class="text-muted mt-3">Belum ada foto yang Anda sukai.</p>
            <a href="{{ route('galeri.index') }}" class="btn btn-outline-dark btn-sm rounded-0">JELAJAHI GALERI</a>
        </div>
        @endforelse
    </div>
</div>
@endsection