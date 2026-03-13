@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="page-header mb-4">
                <h2 class="text-uppercase">Unggah Karya Baru</h2>
                <p class="text-muted small">Bagikan momen dan inspirasi Anda ke dalam galeri kami.</p>
            </div>

            <div class="card shadow-sm border-0 p-4">
                <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="judulFoto" class="form-label small fw-bold text-uppercase">Judul Karya</label>
                        <input type="text" name="judulFoto" id="judulFoto" 
                               class="form-control @error('judulFoto') is-invalid @enderror" 
                               placeholder="Masukkan nama foto..." value="{{ old('judulFoto') }}" required>
                        @error('judulFoto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsiFoto" class="form-label small fw-bold text-uppercase">Deskripsi</label>
                        <textarea name="deskripsiFoto" id="deskripsiFoto" rows="4" 
                                  class="form-control @error('deskripsiFoto') is-invalid @enderror" 
                                  placeholder="Ceritakan sedikit tentang karya ini..." required>{{ old('deskripsiFoto') }}</textarea>
                        @error('deskripsiFoto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="lokasiFile" class="form-label small fw-bold text-uppercase">Pilih File Foto</label>
                        <input type="file" name="lokasiFile" id="lokasiFile" 
                               class="form-control @error('lokasiFile') is-invalid @enderror" required>
                        <div class="form-text mt-2 small">Format: JPG, JPEG, PNG. Maksimal 2MB.</div>
                        @error('lokasiFile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-art">Publikasikan Karya</button>
                        <a href="{{ route('galeri.index') }}" class="btn btn-link text-muted small text-decoration-none">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection