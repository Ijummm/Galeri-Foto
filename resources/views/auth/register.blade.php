@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center py-5">
    <div class="col-md-6">
        <div class="text-center mb-5">
            <h2 class="text-uppercase">Create Account</h2>
            <p class="text-muted small">Bergabunglah dan bagikan karya Anda kepada dunia</p>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white">
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="small fw-bold text-uppercase mb-1">Username</label>
                        <input type="text" name="username" class="form-control rounded-0 shadow-none border-secondary-subtle" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="small fw-bold text-uppercase mb-1">Email</label>
                        <input type="email" name="email" class="form-control rounded-0 shadow-none border-secondary-subtle" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="small fw-bold text-uppercase mb-1">Password</label>

                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control rounded-0 shadow-none border-secondary-subtle" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                            👁
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="small fw-bold text-uppercase mb-1">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" class="form-control rounded-0 shadow-none border-secondary-subtle" required>
                </div>

                <div class="mb-4">
                    <label class="small fw-bold text-uppercase mb-1">Alamat</label>
                    <textarea name="alamat" rows="2" class="form-control rounded-0 shadow-none border-secondary-subtle" required></textarea>
                </div>

                <button type="submit" class="btn btn-art w-100">Daftar Sekarang</button>
            </form>

            <div class="mt-4 text-center">
                <p class="small text-muted">Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-dark fw-bold text-decoration-none border-bottom border-dark">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const password = document.getElementById("password");

    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}
</script>

@endsection