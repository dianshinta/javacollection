@extends('layouts.app')

@section('content')
   <!-- Lupa Password Section -->
   <div class="lupapass" id="reset-password">
        <div class="form-section">
            <h2>Lupa Kata Sandi</h2>
            <!-- Form Pengiriman Link Reset Password -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required>
                    
                </div>
                <button type="submit">Kirim Tautan Reset Kata Sandi</button>
            </form>

            <div class="link-group">
                Ingat Kata Sandi? <a href="{{ route('login') }}">Masuk</a>
            </div>
        </div>
    </div>
@endsection