@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-4">
                <a href="{{ route('galeri.index') }}" class="text-decoration-none text-muted small">
                    ← KEMBALI KE GALERI
                </a>
            </div>

            <div class="row">
                {{-- Bagian Foto --}}
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm bg-white p-2">
                        <img src="{{ asset('storage/photos/' . $foto->lokasiFile) }}" 
                             class="img-fluid w-100" 
                             alt="{{ $foto->judulFoto }}"
                             style="max-height: 80vh; object-fit: contain;">
                    </div>
                </div>

                {{-- Bagian Detail & Interaksi --}}
                <div class="col-md-4">
                    <div class="ps-md-4 mt-4 mt-md-0">
                        
                        {{-- Container Judul dan Like (Update Baru) --}}
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h3 class="m-0 fw-bold text-uppercase h5">{{ $foto->judulFoto }}</h3>

                            <div class="d-flex align-items-center text-danger">
                                @auth
                                    {{-- Form Like yang interaktif --}}
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
                                
                                <span class="ms-2 fw-bold small">{{ $foto->likes()->count() }}</span>
                            </div>
                        </div>

                        <hr class="w-25 mb-4">

                        <div class="mb-4">
                            <label class="small fw-bold text-muted text-uppercase d-block mb-1">Diupload Oleh</label>
                            <p class="mb-0">{{ $foto->user->namaLengkap }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="small fw-bold text-muted text-uppercase d-block mb-1">Tanggal Unggah</label>
                            <p class="mb-0">{{ \Carbon\Carbon::parse($foto->tanggalUnggah)->format('d F Y') }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="small fw-bold text-muted text-uppercase d-block mb-1">Deskripsi Karya</label>
                            <p class="text-secondary small" style="line-height: 1.6;">
                                {{ $foto->deskripsiFoto }} 
                            </p>
                        </div>

                        {{-- Section Komentar --}}
                        <h5 class="text-uppercase small fw-bold border-bottom pb-2">Komentar</h5>
                        <div class="komentar-box mb-3" style="max-height: 200px; overflow-y: auto;">
                            @forelse($foto->komentars as $k)
                                <div class="mb-2 border-bottom pb-2">
                                    <strong class="small">{{ $k->user->username }}</strong>
                                    <p class="mb-0 small text-muted">{{ $k->isiKomentar }}</p>
                                </div>
                            @empty
                                <p class="small text-muted italic">Belum ada komentar.</p>
                            @endforelse
                        </div>

                        @auth
                        <form action="{{ route('komentar.store', $foto->fotoID) }}" method="POST" class="mt-4">
                            @csrf
                            <textarea name="isiKomentar" class="form-control rounded-0 mb-2 small" rows="2" placeholder="Tulis komentar..." required></textarea>
                            <button type="submit" class="btn btn-dark btn-sm rounded-0 w-100">Kirim Komentar</button>
                        </form>
                        @endauth

                        {{-- Opsi Pengelola (Edit/Hapus) --}}
                        @auth
                            @if(Auth::id() == $foto->userID || Auth::user()->role == 'admin')
                            <div class="mt-5 pt-4 border-top">
                                <label class="small fw-bold text-muted text-uppercase d-block mb-3">Opsi Pengelola</label>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('galeri.edit', $foto->fotoID) }}" class="btn btn-outline-dark btn-sm flex-fill rounded-0">EDIT</a>
                                    <form action="{{ route('galeri.destroy', $foto->fotoID) }}" method="POST" class="flex-fill">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100 rounded-0" onclick="return confirm('Hapus karya ini secara permanen?')">HAPUS</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection