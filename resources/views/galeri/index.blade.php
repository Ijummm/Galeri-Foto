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
                    {{-- Container Judul dan Like --}}
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        {{-- KIRI: Judul Foto (ROC dalam contoh) --}}
                        <h3 class="m-0 fw-bold text-uppercase h5">{{ $foto->judulFoto }}</h3>

                        {{-- KANAN: Bagian Like --}}
                        <div class="d-flex align-items-center text-danger">
                            @auth
                            {{-- Form ini bertindak sebagai tombol --}}
                            <form action="{{ route('like.toggle', $foto->fotoID) }}" method="POST" class="d-inline p-0 m-0 border-0 bg-transparent">
                                @csrf
                                <button type="submit" class="btn p-0 m-0 border-0 bg-transparent text-danger shadow-none">
                                    @if($foto->isLikedByUser())
                                    {{-- Hati Terisi jika sudah like --}}
                                    <i class="bi bi-heart-fill fs-5"></i>
                                    @else
                                    {{-- Hati Kosong jika belum like --}}
                                    <i class="bi bi-heart fs-5"></i>
                                    @endif
                                </button>
                            </form>
                            @else
                            {{-- Tampilan untuk Guest (tidak bisa klik) --}}
                            <i class="bi bi-heart text-muted fs-5"></i>
                            @endauth

                            {{-- Jumlah Like (Angka di samping hati) --}}
                            <span class="ms-2 fw-bold small">{{ $foto->likes()->count() }}</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                        <div class="btn-group">
                            <a href="{{ route('galeri.show', $foto->fotoID) }}" class="btn btn-sm btn-outline-dark rounded-0">Detail</a>

                            @auth
                            @if(Auth::id() == $foto->userID || Auth::user()->role == 'admin')
                            <a href="{{ route('galeri.edit', $foto->fotoID) }}" class="btn btn-sm btn-outline-primary rounded-0">Edit</a>
                            <form action="{{ route('galeri.destroy', $foto->fotoID) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-0">Hapus</button>
                            </form>
                            @endif
                            @endauth
                        </div>
                        <small class="text-muted" style="font-size: 0.7rem;">{{ $foto->tanggalUnggah }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection