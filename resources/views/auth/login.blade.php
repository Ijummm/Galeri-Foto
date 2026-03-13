@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-4">
        <div class="text-center mb-5">
            <h2 class="text-uppercase tracking-widest">Sign In</h2>
            <p class="text-muted small">Selamat datang kembali di Galeri Seni</p>
        </div>

        <div class="card border-0 shadow-sm p-4 bg-white">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="small fw-bold text-uppercase mb-1">Email Address</label>
                    <input type="email" name="email" class="form-control rounded-0 shadow-none border-secondary-subtle" placeholder="example@mail.com" required>
                </div>
                
                <div class="mb-4">
                    <label class="small fw-bold text-uppercase mb-1">Password</label>

                    <div class="input-group">
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            class="form-control rounded-0 shadow-none border-secondary-subtle" 
                            placeholder="••••••••" 
                            required
                        >
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                            👁
                        </button>
                    </div>

                </div>

                <button type="submit" class="btn btn-art w-100">Login</button>
            </form>
            
            <div class="mt-4 text-center">
                <p class="small text-muted">Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-dark fw-bold text-decoration-none border-bottom border-dark">Daftar di sini</a>
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