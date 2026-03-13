@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="page-header mb-4">
                <h2 class="text-uppercase">Edit Karya</h2>
                <p class="text-muted small">Perbarui informasi detail untuk karya seni Anda.</p>
            </div>

            <div class="card shadow-sm border-0 p-4">
                <form action="{{ route('galeri.update', $foto->fotoID) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="judulFoto" class="form-label small fw-bold text-uppercase">Judul Karya</label>
                        <input type="text" name="judulFoto" id="judulFoto" 
                               class="form-control @error('judulFoto') is-invalid @enderror" 
                               value="{{ old('judulFoto', $foto->judulFoto) }}" required>
                        @error('judulFoto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsiFoto" class="form-label small fw-bold text-uppercase">Deskripsi</label>
                        <textarea name="deskripsiFoto" id="deskripsiFoto" rows="4" 
                                  class="form-control @error('deskripsiFoto') is-invalid @enderror" 
                                  required>{{ old('deskripsiFoto', $foto->deskripsiFoto) }}</textarea>
                        @error('deskripsiFoto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="form-label small fw-bold text-uppercase d-block">Foto Saat Ini</label>
                        <div class="mb-3">
                            <img src="{{ asset('storage/photos/' . $foto->lokasiFile) }}" 
                                 alt="Current Photo" class="img-thumbnail" style="height: 150px;">
                        </div>
                        
                        <label for="lokasiFile" class="form-label small fw-bold text-uppercase">Ganti Foto (Opsional)</label>
                        <input type="file" name="lokasiFile" id="lokasiFile" 
                               class="form-control @error('lokasiFile') is-invalid @enderror">
                        <div class="form-text mt-2 small">Biarkan kosong jika tidak ingin mengganti foto. </div>
                        @error('lokasiFile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-art">Simpan Perubahan</button>
                        <a href="{{ route('galeri.index') }}" class="btn btn-link text-muted small text-decoration-none">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection